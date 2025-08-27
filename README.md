# Boatrace Open API for Programs

[![cron](https://github.com/BoatraceOpenAPI/programs/actions/workflows/cron.yml/badge.svg)](https://github.com/BoatraceOpenAPI/programs/actions/workflows/cron.yml)
[![pages-build-deployment](https://github.com/BoatraceOpenAPI/programs/actions/workflows/pages/pages-build-deployment/badge.svg)](https://github.com/BoatraceOpenAPI/programs/actions/workflows/pages/pages-build-deployment)
[![issues](https://img.shields.io/github/issues/BoatraceOpenAPI/programs.svg)](https://github.com/BoatraceOpenAPI/programs/issues)
[![pulls](https://img.shields.io/github/issues-pr/BoatraceOpenAPI/programs.svg)](https://github.com/BoatraceOpenAPI/programs/pulls)
[![license](https://img.shields.io/badge/license-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

> **⚠️ 注意事項**
>
> 本 API は**非公式**であり、BOATRACE 公式サイト・団体とは一切関係ありません。
> データはリアルタイム更新ではなく、**約30分間隔で更新**されます。
> データの正確性・完全性を保証するものではありません。
> 利用は自己責任でお願いします。

ボートレース（競艇）の出走表データを取得できる Web API です。
データは GitHub Pages 上で公開されており、JSON 形式で提供しています。

## エンドポイント
```
https://boatraceopenapi.github.io/programs/v2/YYYY/YYYYMMDD.json
```

## サンプル
- [https://boatraceopenapi.github.io/programs/v2/2025/20250715.json](https://boatraceopenapi.github.io/programs/v2/2025/20250715.json)
- [https://boatraceopenapi.github.io/programs/v2/today.json](https://boatraceopenapi.github.io/programs/v2/today.json)

## 関連
| 対象 | リポジトリ | エンドポイント |
|:---|:---|:---|
| 直前情報 | [Boatrace Open API for Previews](https://github.com/BoatraceOpenAPI/previews) | https://boatraceopenapi.github.io/previews/v2/YYYY/YYYYMMDD.json |
| 結果 | [Boatrace Open API for Results](https://github.com/BoatraceOpenAPI/results) | https://boatraceopenapi.github.io/results/v2/YYYY/YYYYMMDD.json |

## ライセンス
Boatrace Open API for Programs は [MITライセンス](LICENSE) の元で公開されています。
