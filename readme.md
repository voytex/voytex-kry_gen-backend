# MPC-KRY Projekt Back-end
## Published API
> **Note**<br>
> `@` = `vut-fekt-mpckry-gr14.8u.cz`


| URI | Returns | Usage | Implemented |
| --- | ------- | ----- | --- |
| `@/index.php/alltasks` | returns all task prototypes *without values* | - | ✅ |
| `@/index.php/task?code={type}` | returns a single task of given `{type}` | `@/index.php/task?code=rsa` | ✅ |
| `@/index.php/task/random` | returns a single task of random type | - | ❌ |

> **Note**<br>
> Everything returns a **JSON object** which can be then interpreted in front-end app. 