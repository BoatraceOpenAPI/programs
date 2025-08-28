# 🚤 Boatrace Open API for Programs

[![cron](https://github.com/BoatraceOpenAPI/programs/actions/workflows/cron.yml/badge.svg)](https://github.com/BoatraceOpenAPI/programs/actions/workflows/cron.yml)
[![pages-build-deployment](https://github.com/BoatraceOpenAPI/programs/actions/workflows/pages/pages-build-deployment/badge.svg)](https://github.com/BoatraceOpenAPI/programs/actions/workflows/pages/pages-build-deployment)
[![issues](https://img.shields.io/github/issues/BoatraceOpenAPI/programs.svg)](https://github.com/BoatraceOpenAPI/programs/issues)
[![pulls](https://img.shields.io/github/issues-pr/BoatraceOpenAPI/programs.svg)](https://github.com/BoatraceOpenAPI/programs/pulls)
[![license](https://img.shields.io/badge/license-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

## ⚠️ 注意事項
>
> ⚡ 本 API は**非公式**であり、BOATRACE 公式サイト・団体とは一切関係ありません。<br>
> 🕒 データはリアルタイム更新ではなく、**約30分間隔で更新**されます。<br>
> 🔍 データの正確性・完全性を保証するものではありません。<br>
> 🙇‍♂️ 利用は自己責任でお願いします。

## 📌 概要
この API では、ボートレース（競艇）の出走表データを取得できます。<br>
データは GitHub Pages 上で公開されており、JSON形式で提供されます。

## 🌐 エンドポイント
```bash
https://boatraceopenapi.github.io/programs/v2/YYYY/YYYYMMDD.json
```

📅 YYYY → 年<br>
📅 YYYYMMDD → 年月日

## 🧩 サンプル
- 2025年07月14日の出走表
  - [https://boatraceopenapi.github.io/programs/v2/2025/20250714.json](https://boatraceopenapi.github.io/programs/v2/2025/20250714.json)
- 本日の出走表
  - [https://boatraceopenapi.github.io/programs/v2/today.json](https://boatraceopenapi.github.io/programs/v2/today.json)

## 🔗 関連リポジトリ
| 🏷️ 対象 | 📂 リポジトリ |
|:--|:--|
| ⏱️ 直前情報 | [Boatrace Open API for Previews](https://github.com/BoatraceOpenAPI/previews) |
| 🏆 結果 | [Boatrace Open API for Results](https://github.com/BoatraceOpenAPI/results) |

## 📄 ライセンス
Boatrace Open API for Programs は [MITライセンス](LICENSE) の元で公開されています。
