## cakephp 3 controller example

```php

$this->Articles  is the model class of the articles table

<?php

namespace App\Controller;

use App\Controller\AppController;

class ArticlesController extends AppController
{
    public function index()
    {
        $articles = $this->Articles->find('all');
        $this->set(compact('articles'));
    }
    //this correspond to url = /articles/view/test-slug . where 'test-slug' is the slug of the article
    public function view($slug = null)
    {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        $this->set(compact('article'));
    }

    //another example of view, this time we pass the id of the article
    //correspond to url = /articles/view/1 . where '1' is the id of the article
    public function view($articleId = null)
    {
        $article = $this->Articles->get($articleId);
        $this->set(compact('article'));
    }


    public function findByAuthor(string $author = null)
    {
        $articles = $this->Articles->findByAuthor($author)->all();
        $this->set(compact('articles'));
    }
}
```

 ### passing data to controller

 example , using Post method

```php

  public function createArticle()
  {
    $this->request->allow(['post']); // strict to POST Only
    if($this->request->is('post')){
      $article = $this->Articles->newEntity($this->request->getData);
      if($this->Articles->save($article)){
        $this->Flash->success(__('Your article has been saved.'));
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('Unable to add your article.'));
    }
  }

```
 - but , we love our controller to be clean, so logic should be in model, not in controller

```php
// in ArticlesTable.php class

//createNewArticle() is the method name
// this is how we pass data from controller layer, to model layer

  public function createNewArticle(array $data)
  {
    $article = $this->newEntity($data);
    if($this->save($article)){
      return $article ;
    }
    return false;
  }

```

 - then in controller

```php

  public function createArticle()
  {
    $this->request->allow(['post']); // strict to POST Only
    if($this->request->is('post')){
      if($this->Articles->createNewArticle($this->request->getData)){
        $this->Flash->success(__('Your article has been saved.'));
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('Unable to add your article.'));
    }
  }

```
```
