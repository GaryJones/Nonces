<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Tests\Unit;

use Brain\Monkey;
use Inpsyde\Nonces\Context as Testee;

/**
 * Test case for the Context class.
 *
 * @package Inpsyde\Nonces\Tests\Unit
 */
class ContextTest extends TestCase {

	/**
	 * Test for the get_action() method.
	 *
	 * @return void
	 */
	public function test_get_action() {

		Monkey\Functions::when( 'sanitize_title_with_dashes' );

		$action = 'action';

		$testee = new Testee( $action );

		$this->assertSame( $action, $testee->get_action() );
	}

	/**
	 * Test for the get_name() method.
	 *
	 * @dataProvider provide_get_name_data
	 *
	 * @param string $expected
	 * @param string $action
	 * @param string $name
	 *
	 * @return void
	 */
	public function test_get_name( $expected, $action, $name ) {

		Monkey\Functions::when( 'sanitize_title_with_dashes' )
			->returnArg();

		$testee = new Testee( $action, $name );

		$this->assertSame( $expected, $testee->get_name() );
	}

	/**
	 * Data provider for the test_get_name() method.
	 *
	 * @return array[]
	 */
	public function provide_get_name_data() {

		$action = 'action';

		$name = 'name';

		return [
			'with_name'  => [
				'expected' => $name,
				'action'   => $action,
				'name'     => $name,
			],
			'empty_name' => [
				'expected' => $action . '_nonce',
				'action'   => $action,
				'name'     => '',
			],
		];
	}
}
