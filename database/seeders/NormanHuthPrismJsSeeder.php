<?php

namespace Database\Seeders;

use App\Models\NormanHuthPrismJs;
use Illuminate\Database\Seeder;

class NormanHuthPrismJsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NormanHuthPrismJs::writable()->create(['content' => $this->content]);
    }

    protected string $content = '# Prism.js Test

Packakge: [nova-prism-js](https://github.com/Muetze42/nova-prism-js)

```php
<?php

namespace App\Nova\Resources;

use Exception;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use NormanHuth\NovaMarkdownIt\MarkdownIt;
use Spatie\TagsField\Tags;
use Laravel\Nova\Fields\Tag;
use Laravel\Nova\Panel;

class Article extends Resource
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
```

asd

```css
body {
  background-color: lightblue;
}

h1 {
  color: white;
  text-align: center;
}

p {
  font-family: verdana;
  font-size: 20px;
}
```

```html
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>This is a Heading</h1>
<p>This is a paragraph.</p>

</body>
</html>
```

```javascript
document.querySelector(\'.class\'); // Selects the first element with the "class" class
document.querySelector(\'#id\'); // Selects the first element with an `id` of "id"
document.querySelector(\'[data-other]\'); // Selects the first element with the "data-other" attribute
document.querySelectorAll(\'.multiple\'); // Returns an Array of all elements with the "multiple" class
```

```python
n = int(input(\'Type a number, and its factorial will be printed: \'))

if n < 0:
    raise ValueError(\'You must enter a non-negative integer\')

factorial = 1
for i in range(2, n + 1):
    factorial *= i

print(factorial)
```

```rust
fn main() {
    // Statements here are executed when the compiled binary is called

    // Print text to the console
    println!("Hello World!");
}

```

```scss
SCSS SYNTAX
$font-stack: Helvetica, sans-serif;
$primary-color: #333;

body {
  font: 100% $font-stack;
  color: $primary-color;
}
```

```sql
SELECT Count(*) AS DistinctCountries
FROM (SELECT DISTINCT Country FROM Customers);
```

```java
public class Main {
  public static void main(String[] args) {
    int x = 5, y = 6, z = 50;
    System.out.println(x + y + z);
  }
}
```

```json
{"name":"John", "age":30, "car":null}
```

```less
@width: 10px;
@height: @width + 10px;

#header {
  width: @width;
  height: @height;
}
```

```yaml
 doe: "a deer, a female deer"
 ray: "a drop of golden sun"
 pi: 3.14159
 xmas: true
 french-hens: 3
 calling-birds:
   - huey
   - dewey
   - louie
   - fred
 xmas-fifth-day:
   calling-birds: four
   french-hens: 3
   golden-rings: 5
   partridges:
     count: 1
     location: "a pear tree"
   turtle-doves: two
```

```markdown
# h1 Heading 8-)
## h2 Heading
### h3 Heading
#### h4 Heading
##### h5 Heading
###### h6 Heading


## Horizontal Rules

___
```

```csv
1997,Ford,E350,"Go get one now
they are going fast"
```';
}
