<?phpreturn array(  'router' => array(    'routes' => array(      'blog' => array(        'type' => 'Segment',        'options' => array(          'route'    => '/:lang/blog',          'defaults' => array(            'language'   => 'de',            'module'     => 'blog',            'controller' => 'index',            'action'     => 'index',          ),        ),      ),      'blog-article' => array(        'type' => 'Segment',        'options' => array(          'route'    => '/:lang/beitrag/:url',          'defaults' => array(          'language'   => 'de',          'module'     => 'blog',          'controller' => 'index',          'action'     => 'show',        ),      ),    ),  ),),[...]);