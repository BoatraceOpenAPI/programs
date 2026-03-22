<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use BOA\Programs\ProgramScraper;
use BOA\Programs\ProgramSaver;
use BOA\Programs\ScraperAdapter;
use BVP\Scraper\Scraper;
use Carbon\CarbonImmutable as Carbon;

// コマンドライン引数からバージョンを取得（デフォルトは v3）
$version = $argv[1] ?? 'v3';

// 本日の日付を東京時間で取得
$date = Carbon::today('Asia/Tokyo');

// v2 or v3 の場合のみ ProgramScraper を利用して出走表データを取得
if ($version === 'v2' || $version === 'v3') {
    $scraperInstance = Scraper::getInstance();
    $scraperAdapter = new ScraperAdapter($scraperInstance);
    $scraper = new ProgramScraper($scraperAdapter);

    // 指定日付の出走表データをスクレイピング
    $programs = $scraper->scrape($date);
}

// 出走表データが取得できなかった場合は処理終了
if (empty($programs ?? [])) {
    exit;
}

// 出走表データを JSON ファイルとして保存
// 日付付きの JSON ファイルとして保存（例: docs/{version}/YYYY/YYYYMMDD.json）
// 最新データとして today.json にも保存
$saver = new ProgramSaver();
$saver->save($programs, "docs/{$version}/" . $date->format('Y') . '/' . $date->format('Ymd') . '.json');
$saver->save($programs, "docs/{$version}/today.json");
