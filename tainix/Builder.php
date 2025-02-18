<?php
namespace Tainix;

use GuzzleHttp\Client;
use Tainix\DataFormater;

final class Builder
{
	private const TAINIX_URL_ENGINES_LIST = 'https://tainix.fr/api/engines/list';
	private const TAINIX_URL_ENGINE_SAMPLE = 'https://tainix.fr/api/engines/sample/';
	private const LOCAL_CHALLENGES_DIR = './challenges/';
	private const LOCAL_TEST_PEST_DIR = './tests/';
	private const LOCAL_TEST_PHPUNIT_DIR = './units/';
	private const LOCAL_CHALLENGES_JSON = 'challenges.json';

	private Client $client;

	public function __construct()
	{
		$this->client = new Client(['verify' => false]);
	}

	public function build(): int
	{
		// Vérification des dossiers de base
		$this->writeDir(self::LOCAL_CHALLENGES_DIR);
		$this->writeDir(self::LOCAL_TEST_PEST_DIR);
		$this->writeDir(self::LOCAL_TEST_PHPUNIT_DIR);

		$request = $this->client->request('GET', self::TAINIX_URL_ENGINES_LIST);

		$nbNewEngines = 0;

		if ($request->getStatusCode() != 200) {
			return 0;
		}

		// On met tout dans un fichier
		$challengeFileJson = fopen(self::LOCAL_CHALLENGES_DIR . self::LOCAL_CHALLENGES_JSON, 'w+');
		fwrite($challengeFileJson, $request->getBody());
		fclose($challengeFileJson);

		$enginesList = json_decode($request->getBody(), true);

		foreach ($enginesList['engines'] as $key => $code) {

			if (!is_dir(self::LOCAL_CHALLENGES_DIR . $code)) {

				// 1. Création du dossier
				mkdir(self::LOCAL_CHALLENGES_DIR . $code);

				// 2. Création du fichier du challenge, réponse via API
				$this->writeFile(
					$code,
					strtolower($code) . SUFFIX_API_FILE,
					self::LOCAL_CHALLENGES_DIR . $code . '/',
					'contentChallengeFile'
				);

				// 3. Création du fichier Sample, à traiter en local
				$this->writeFile(
					$code,
					strtolower($code) . SUFFIX_LOCAL_FILE,
					self::LOCAL_CHALLENGES_DIR . $code . '/',
					'contentSampleFile'
				);

				// 4. Création du fichier de test Pest
				$this->writeFile(
					$code,
					ucfirst(strtolower($code)) . SUFFIX_TEST_PEST_FILE,
					self::LOCAL_TEST_PEST_DIR,
					'contentEmptyFile'
				);

				// 5. Création du fichier PHP Unit
				$this->writeFile(
					$code,
					ucfirst(strtolower($code)) . SUFFIX_TEST_PHPUNIT_FILE,
					self::LOCAL_TEST_PHPUNIT_DIR,
					'contentPHPUnitFile'
				);

				$nbNewEngines++;
			}
		}

		return $nbNewEngines;
	}

	private function writeDir(string $dir): bool
	{
		if (file_exists($dir)) {
			return false;
		}

		mkdir($dir);
		return true;
	}

	private function writeFile(string $code, string $fileName, string $dir, string $contentFunction): bool
	{
		// Sécurité, si le fichier existe déjà, on ne l'écrase pas
		if (file_exists($dir . $fileName)) {
			return false;
		}

		$file = fopen($dir . $fileName, 'w+');
		fwrite($file, $this->$contentFunction($code));
		fclose($file);

		return true;
	}

	public function linksOfEngines(string $type): array
	{
		if (!file_exists(self::LOCAL_CHALLENGES_DIR . self::LOCAL_CHALLENGES_JSON)) {
			return [];
		}

		$challengeFileJson = file_get_contents(self::LOCAL_CHALLENGES_DIR . self::LOCAL_CHALLENGES_JSON);
		$enginesList = json_decode($challengeFileJson, true);

		$links = [];

		foreach ($enginesList['engines'] as $key => $code) {

			$links[] = [
				'url' => $code . '_' . $type,
				'name' => $code,
			];
		}

		return $links;
	}

	private function contentChallengeFile(string $code): string
	{
		$out = '<?php' . "\n";
		$out .= 'namespace Challenges\\' . $code .';' . "\n\n";

		$out .= 'use Tainix\Game;' . "\n";
		$out .= 'use Tainix\Html;' . "\n\n";

		$out .= '// INITIALISATION ---------------------' . "\n";
		$out .= '$game = new Game(' . "\n";
		$out .= '	TAINIX_KEY,' . "\n";
		$out .= '	basename(__DIR__)' . "\n";
		$out .= ');' . "\n\n";

		$out .= '$data = $game->input();' . "\n\n";

		$out .= '// VISUALISATION DES DONNEES ----------' . "\n";
		$out .= 'foreach ($data as $name => $value) {' . "\n";
		$out .= '	$$name = $value;' . "\n";
		$out .= '	Html::debug($$name, \'$\' . $name);' . "\n";
		$out .= '}' . "\n\n";

		$out .= '// CODE DU CHALLENGE ------------------' . "\n\n\n\n\n";

		$out .= '// REPONSE ----------------------------' . "\n";
		$out .= '// $game->output([\'data\' => ...]);';

		return $out;
	}

	private function contentSampleFile(string $code): string
	{	
		$out = '<?php' . "\n";
		$out .= 'namespace Challenges\\' . $code .';' . "\n\n";

		$out .= 'use Tainix\Html;' . "\n\n";

		$request = $this->client->request('GET', self::TAINIX_URL_ENGINE_SAMPLE . $code);

		if ($request->getStatusCode() != 200) {
			return $out . '// Erreur...';
		}

		$engineSample = json_decode($request->getBody(), true)['sample'];

		$out .= '// ECHANTILLON ------------------------' . "\n";
		$out .= DataFormater::dataToCode($engineSample['input_data']) . "\n";

		$out .= DataFormater::dataToDebug($engineSample['input_data']) . "\n";

		$out .= '// CODE DU CHALLENGE ------------------' . "\n\n\n\n\n";

		$out .= '// REPONSE ATTENDUE -------------------' . "\n";
		$out .= 'Html::debug(\''. $engineSample['correct_response'] .'\', \'Réponse attendue\', \'success\');';

		return $out;
	}

	private function contentEmptyFile(string $code): string
	{
		return '<?php' . "\n";
	}

	private function contentPHPUnitFile(string $code): string
	{
		$className = ucfirst(strtolower($code)) . 'Test';

		$out = '<?php' . "\n";
		$out .= 'declare(strict_types=1);' . "\n\n";

		$out .= 'use PHPUnit\Framework\TestCase;' . "\n\n";

		$out .= 'final class '. $className .' extends TestCase' . "\n";
		$out .= '{' . "\n";
		$out .= '	public function setUp(): void' . "\n";
		$out .= '	{' . "\n";
		$out .= '		parent::setUp();' . "\n";
		$out .= '	}' . "\n\n";

		$out .= '	// TES METHODES DE TEST ---------------------' . "\n\n";
		
		$out .= '}';

		return $out;
	}
}