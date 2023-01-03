## Exercise, create a model ,controller and template view


1. Create the database tables for each of the four entities: articles, articles tags, tags, and users. You can use a database management tool such as MySQL Workbench or PHPMyAdmin to create the tables and define the relationships between them.
2. Generate the model classes for each of the four entities using the CakePHP console. For example, to generate the model class for the articles table, you can run the following command:

```

bin/cake bake model articles

```

1. Generate the controller classes for each of the four entities using the CakePHP console. For example, to generate the controller class for the articles table, you can run the following command:

```

bin/cake bake controller articles

```

1. Define the routes for the controller actions in the **`routes.php`** file. For example, to define a route for the **`index`** action of the **`ArticlesController`**, you can add the following line to the **`routes.php`** file:

```

$routes->connect('/articles', ['controller' => 'Articles', 'action' => 'index']);

```

1. Implement the controller actions in the controller classes. For example, the **`index`** action of the **`ArticlesController`** might retrieve a list of articles from the database and pass them to the view:

```

public function index()
{
  $articles = $this->Articles->find('all');
  $this->set(compact('articles'));
}

```

1. Create the view templates for the controller actions in the **`Template/Articles`** folder. For example, the view template for the **`index`** action might display the list of articles:

```

<table>
  <tr>
    <th>Title</th>
    <th>Author</th>
    <th>Body</th>

  </tr>
  <?php foreach ($articles as $article): ?>
    <tr>
      <td><?= h($article->title) ?></td>
      <td><?= h($article->user->id) ?></td>
            <td><?= h($article->body) ?></td>

    </tr>
  <?php endforeach; ?>
</table>
```

## Challenge
- Create a new controller and template view for the tickets table
- If you notice. The user table did not have column for username. Please add the column for username.Display in the template.