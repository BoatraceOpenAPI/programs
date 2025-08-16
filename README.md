# Boatrace Open API for Programs

[![cron](https://github.com/BoatraceOpenAPI/programs/actions/workflows/cron.yml/badge.svg)](https://github.com/BoatraceOpenAPI/programs/actions/workflows/cron.yml)
[![pages-build-deployment](https://github.com/BoatraceOpenAPI/programs/actions/workflows/pages/pages-build-deployment/badge.svg)](https://github.com/BoatraceOpenAPI/programs/actions/workflows/pages/pages-build-deployment)
[![issues](https://img.shields.io/github/issues/BoatraceOpenAPI/programs.svg)](https://github.com/BoatraceOpenAPI/programs/issues)
[![pulls](https://img.shields.io/github/issues-pr/BoatraceOpenAPI/programs.svg)](https://github.com/BoatraceOpenAPI/programs/pulls)
[![license](https://img.shields.io/badge/license-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

ボートレース（競艇）の出走表データが取得可能な Web API です。
GitHub Pages を用いて静的な JSON ファイルとして配信しています。

## エンドポイント
```
https://boatraceopenapi.github.io/programs/v2/{日付}.json
```

## サンプル
- [https://boatraceopenapi.github.io/programs/v2/20250715.json](https://boatraceopenapi.github.io/programs/v2/20250715.json)
- [https://boatraceopenapi.github.io/programs/v2/today.json](https://boatraceopenapi.github.io/programs/v2/today.json)

## 関連
| 対象 | リポジトリ | エンドポイント |
|:---|:---|:---|
| 直前情報 | [Boatrace Open API for Previews](https://github.com/BoatraceOpenAPI/previews) | https://boatraceopenapi.github.io/previews/v2/{日付}.json |
| 結果 | [Boatrace Open API for Results](https://github.com/BoatraceOpenAPI/results) | https://boatraceopenapi.github.io/results/v2/{日付}.json |

## ライセンス
Boatrace Open API for Programs は [MITライセンス](LICENSE) の元で公開されています。
