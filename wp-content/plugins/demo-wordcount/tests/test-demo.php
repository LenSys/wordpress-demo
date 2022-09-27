<?php

// https://make.wordpress.org/core/handbook/testing/automated-testing/writing-phpunit-tests/

/**
 * Class SampleTest
 *
 * @package Demo_WordCount
 */

/**
 * Sample test case.
 */
class TestDemoTest extends WP_UnitTestCase {

	//public function setUp(){

		// make a fake user
		// $this->author = new WP_User( $this->factory->user->create( array( 'role' => 'editor' ) ) );	
	//}


	/**
	 * A single example test.
	 */
	public function test_wp_dp_follow_us() {
		$postId = $this->factory->post->create( array( 'post_title' => 'My Title', 'post_content' => 'My Post content' ) );
		$this->assertTrue( is_int( $postId ) && ( $postId > 0 ) );

		$post = get_post( $postId );
		$this->assertTrue( $post instanceof WP_POST );
		$this->assertEquals( "post", $post->post_type );

		$demoWordCount = new DemoWordCount();
		$content = $demoWordCount->wp_dp_follow_us($post->post_content);

		$this->assertTrue( stristr($content, "<div class='demo'>Follow us on Twitter...</div>") !== false );

	}

	public function test_getWordCount() {
		$content = "Alle meine Entchen schwimmen auf dem See, schwiMMen auf dem SEE.?!";

		$demoWordCount = new DemoWordCount();
		$countWords = $demoWordCount->getWordCount( $content );

		$this->assertEquals( 3, count($countWords) );
		$this->assertSame( array (
			'entchen' => 1,
			'schwimmen' => 2,
			'see' => 2
		  ), $countWords );
	}


	public function test_splitWords() {
		$content = "Alle meine Entchen schwimmen auf dem See, schwiMMen auf dem SEE.?!";

		$demoWordCount = new DemoWordCount();
		$splitWords = $demoWordCount->splitWords( $content );

		$this->assertEquals( 11, count($splitWords) );
		$this->assertSame( array (
			0 => 'alle',
			1 => 'meine',
			2 => 'entchen',
			3 => 'schwimmen',
			4 => 'auf',
			5 => 'dem',
			6 => 'see',
			7 => 'schwimmen',
			8 => 'auf',
			9 => 'dem',
			10 => 'see',
		  ), $splitWords );
	}


	public function test_getStopWords() {
		$demoWordCount = new DemoWordCount();
		$stopWords = $demoWordCount->getStopWords();

		$this->assertEquals( 53, count($stopWords) );
	}
}
