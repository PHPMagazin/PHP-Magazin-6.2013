<?phpnamespace Application;use Zend\Mvc\ModuleRouteListener;use Zend\Mvc\MvcEvent;use Application\Listener\ApplicationListener;class Module{  public function onBootstrap(MvcEvent $e)  {    $eventManager        = $e->getApplication()->getEventManager();    $moduleRouteListener = new ModuleRouteListener();    $moduleRouteListener->attach($eventManager);        // add application listener    $eventManager->attachAggregate(new ApplicationListener());  }  [...]}