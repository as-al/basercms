<?php
/**
 * test for BcUploadHelper
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2015, baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright 2008 - 2015, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.Test.Case.View.Helper
 * @since           baserCMS v 3.0.0-beta
 * @license			http://basercms.net/license/index.html
 */

App::uses('BcUploadHelper', 'View/Helper');

/**
 * test for BcUploadHelper
 *
 * @package			Baser.Test.Case.View.Helper
 */
class BcUploadHelperTest extends BaserTestCase {
	
/**
 * Fixtures
 * @var array 
 */
	public $fixtures = array(
		'baser.Default.PluginContent',
		'baser.Default.Content',
		'baser.Default.Site',
		'baser.Default.Page',
	);

/**
 * setUp
 */
	public function setUp() {
		parent::setUp();
		$this->BcUpload = new BcUploadHelper(new View);
		$this->BcUpload->request = new CakeRequest('/', false);
	}

/**
 * tearDown
 */
	public function tearDown() {
		unset($this->BcUpload);
		parent::tearDown();
	}

/**
 * ファイルへのリンクタグを出力する
 */
	public function testFileLink() {
		$this->BcUpload->request->data = array(
			'EditorTemplate' => array(
				'id' => '1',
				'name' => '画像（左）とテキスト',
				'image' => 'template1.jpg',
				'description' => '説明文',
				'modified' => '2013-07-21 01:41:12', 'created' => '2013-07-21 00:53:42',
			)
		);
		$result = $this->BcUpload->fileLink('EditorTemplate.image');
		$this->assertRegExp('/<a href=\"\/files\/editor\/template1\.jpg/', $result);
	}

/**
 * ファイルへのリンクタグを出力する(hasMany対応)
 */
	public function testFileLinkHasManyField() {
		$this->BcUpload->request->data = array(
			'EditorTemplate' => array(
				array(
					'id' => '1',
					'name' => '画像（左）とテキスト',
					'image' => 'template1.jpg',
					'description' => '説明文',
					'modified' => '2013-07-21 01:41:12', 'created' => '2013-07-21 00:53:42',
				),
			)
		);
		$result = $this->BcUpload->fileLink('EditorTemplate.0.image');
		$this->assertRegExp('/<a href=\"\/files\/editor\/template1\.jpg/', $result);
	}

/**
 * アップロードした画像のタグを出力する
 */
	public function testUploadImage() {
		
		// オプションなし
		$result = $this->BcUpload->uploadImage('EditorTemplate.image', 'template1.jpg');
		$this->assertRegExp('/^<a href=\"\/files\/editor\/template1\.jpg[^>]+?\"[^>]+?><img src=\"\/files\/editor\/template1\.jpg[^>]+?\"[^>]+?><\/a>/', $result);
		
		// サイズ指定あり
		$options = array(
			'width' => '100',
			'height' => '80',
		);
		$result = $this->BcUpload->uploadImage('EditorTemplate.image', 'template1.jpg', $options);
		$expects = '<img src="/uploads/tmp/medium/template1.jpg" alt="" width="100" height="80" />';
		$this->assertRegExp('/^<a href=\"\/files\/editor\/template1\.jpg[^>]+?\"[^>]+?><img src=\"\/files\/editor\/template1\.jpg[^>]+?\"[^>]+?alt="" width="100" height="80"[^>]+?><\/a>/', $result);

		// 一時ファイルへのリンク（デフォルトがリンク付だが、Aタグが出力されないのが正しい挙動）
		$options = array(
			'tmp' => true
		);
		$result = $this->BcUpload->uploadImage('EditorTemplate.image', 'template1.jpg', $options);
		$expects = '<img src="/uploads/tmp/medium/template1.jpg" alt=""/>';
		$this->assertEquals($expects, $result);

		// output を tag で、linkをtrue (無視される)
		$options = array(
			'link' => true,
			'output' => 'tag'
		);
		$result = $this->BcUpload->uploadImage('EditorTemplate.image', 'template1.jpg', $options);
		$this->assertRegExp('/^<img src=\"\/files\/editor\/template1\.jpg[^>]+?\"[^>]+?>/', $result);

		// output を urlに
		$options = array(
			'output' => 'url'
		);
		$result = $this->BcUpload->uploadImage('EditorTemplate.image', 'template1.jpg', $options);
		$this->assertRegExp('/^\/files\/editor\/template1\.jpg\?[0-9]+/', $result);
	}

}
