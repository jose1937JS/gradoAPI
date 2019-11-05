<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;

use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{

	public $parser;

	public function __construct()
	{

		// $fs = app('filesystem');
		$this->parser = new \Smalot\PdfParser\Parser();
	}

	public function index(Request $req)
	{
		$file = $req->file('file');
		$filepath = $file->storeAs('public', $file->getClientOriginalName());
		// $filename = storage_path($filepath);

		// dd($filepath);

		$pdf  = $this->parser->parseFile('../storage/app/public/'. $file->getClientOriginalName());
		$text = $pdf->getText();

		dd($text);


		// foreach ($pages as $page) {
		//     dump($page->getText());
		// }
	}
}
