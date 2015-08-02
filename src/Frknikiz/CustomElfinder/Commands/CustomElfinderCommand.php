<?php namespace Frknikiz\CustomElfinder\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use File;
class CustomElfinderCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'cfinder:pub';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $elfinder_cfg_path= realpath(__DIR__."../../../../config/config.php");
        $target=app_path().'\config\packages\barryvdh\laravel-elfinder\config.php';


        if (!File::exists(public_path("uploads"))) {
            File::makeDirectory(public_path("uploads"), 775, true, true);
        }

        if(!File::exists(dirname($target)))
        {
            File::makeDirectory(dirname($target), 775, true, true);
        }
        if(!copy($elfinder_cfg_path,$target))
        {
            echo "Dosya kopyalamadi !!!";
        }

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
        return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
        return array();
	}

}
