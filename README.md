# Common bus

# Bus

You can create your own bus implementing CommandBus or QueryBus Interface, or you can use the pre-configured Bus CommandBusSync for Commands or QueryBusSync for Queries

# Using Buses

```php
$bus = new CommandBusSync();
$bus->register(YourCommandClass::class, new Your\Invokable\Handler());
$bus->dispatch(new YourCommandClass());
```
If you use a Service Container like Symfony Dependency Injection you can configure your bus registering your commands:
```yaml
unilae.bus.sync-command:
    class: Unilae\HexagonalUtils\Infrastructure\Bus\Command\CommandBusSync
    calls:
      - method: register
        arguments:
         - 'Your\Command\Class\Name'
         - '@Your\Handler\Service\Id'
```
With this, you can inject the bus to your controller:

```php
final class MyController
{
    private $bus;
    
    public function __construct(CommandBusSync $bus)
    {
        $this->bus = $bus;    
    }
    
    public function __invoke(Request $request)
    {
        $this->bus->dispatch(
            new Your\Command\Class(
                new Uuid($request->get('request_id'))
            )
        );
    }
}

```

If you register more than one command to the same bus, i suggest you to install and use `ocramius/proxy-manager` for proxy handlers.

# Using Middlewares
The pre-configured command bus supports Middleware chain, for use you can pass your Middleware classes to your Bus constructor