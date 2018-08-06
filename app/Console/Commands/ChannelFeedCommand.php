<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use DB;
use App\Models\Ticket;
use Carbon\Carbon;
use App\Events\TicketLogEvent;
use App\Events\EmailEvent;

class ChannelFeedCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'channel:feed';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command for feeding the channels';

	
	/**
	 * Create a new command instance.
	 *
	 * @return \ChannelFeedCommand
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function handle() {
		Log::info('ChannelFeedCommand', ['Connect']);
		
		Log::alert('Feeding the channels');
		
		Log::info('ChannelFeedCommand', ['Disconnect']);
		
	}
}
