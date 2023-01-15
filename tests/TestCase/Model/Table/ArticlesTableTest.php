<?php

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticlesTable;
use App\Model\Table\ArticlesTagsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Migrations\Command\Dump;
use Psy\VarDumper\Dumper;

/**
 * App\Model\Table\ArticlesTable Test Case
 */
class ArticlesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArticlesTable
     */
    public $Articles;
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArticlesTagsTable
     */
    public $ArticlesTags;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Articles',
        'app.Tags',
        'app.ArticlesTags',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()
            ->exists('Articles') ?
            []
            :
            [
                'className' => ArticlesTable::class
            ];


        $configArticlesTags = TableRegistry::getTableLocator()
            ->exists(
                'ArticlesTags'
            ) ?
            []
            :
            [
                'className' => ArticlesTagsTable::class
            ];

        $this->Articles = TableRegistry::getTableLocator()->get('Articles', $config);

        $this->ArticlesTags = TableRegistry::getTableLocator()->get('ArticlesTags', $configArticlesTags);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Articles, $this->ArticlesTags);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->assertInstanceOf(ArticlesTable::class, $this->Articles);
        //$this->markTestIncomplete('Not implemented yet.');
    }

    public function testFindArticleByTag()
    {

        $r = $this->Articles->findArticleByTag('tag two');
        $this->assertNotEmpty($r);
        //$this->markTestIncomplete('Not implemented yet.');
    }

    public function testSave()
    {
        $data = [

            'user_id' => 3,
            'title' => 'Dolor sit amet atoz',
            'slug' => 'Dolor-sit-amet-atoz',
            'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'published' => false,
        ];
        $article = $this->Articles->newEntity($data);

        $article = $this->Articles->save($article);




        $this->assertNotEmpty($this->Articles->get($article->id));
        //$this->markTestIncomplete('Not implemented yet.');
    }

    public function testPublishArticle()
    {
        $id = 3;

        $article = $this->Articles->findById($id);
        if ($article) {
            $this->Articles->publishArticle($id);
            $article = $this->Articles->findById($id)->first();
            $this->assertEquals($article->published, true);
        }
    }
}
