# Boatrace Open API for Programs

ボートレース（競艇）の出走表データを取得できるWeb APIです。
GitHub Pagesを使用して静的なJSONファイルとして配信しています。

## エンドポイント
```
https://boatraceopenapi.github.io/programs/v1/{日付}.json
```

## サンプル
- [https://boatraceopenapi.github.io/programs/v1/20250410.json](https://boatraceopenapi.github.io/programs/v1/20250410.json)
- [https://boatraceopenapi.github.io/programs/v1/today.json](https://boatraceopenapi.github.io/programs/v1/today.json)

## 関連
| 対象 | リポジトリ | エンドポイント |
|:---|:---|:---|
| 直前情報 | [Boatrace Open API for Previews](https://github.com/BoatraceOpenAPI/previews) | https://boatraceopenapi.github.io/previews/v1/{日付}.json |
| 結果 | [Boatrace Open API for Results](https://github.com/BoatraceOpenAPI/results) | https://boatraceopenapi.github.io/results/v1/{日付}.json |

## ライセンス
The Boatrace Open API for Programs is open source software licensed under the [MIT license](LICENSE).
