any register should implement Yawa20\RegistryBundle\Registry\RegistryInterface

basic implementations you can found in Yawa20\RegistryBundle\Registry\SimpleRegistry
 
```
services:
  my_custrom_registry:
    class: Yawa20\RegistryBundle\Registry\SimpleRegistry

```


to register items in defined registry:

```
services:
  my_custrom_item:
     class: Class\Of\My\Item
     tags:
       - {name: 'app.registry.item', registry:'my_custrom_registry' }
  
```


any of item should implement Yawa20\RegistryBundle\Registry\RegistrableInterface

by default, registry accepts any item of RegistrableInterface.

if you want to define another, just set it as argument of registry
```
services:
  my_custrom_registry:
    class: Yawa20\RegistryBundle\Registry\SimpleRegistry
    arguments:
      - 'MyCustomInterface'

```

or, if you want to use autowiring, you just should add tags for you registrable services:
 
```
    App\MyRegistrableServices\:
        resource: '../../src/MyRegistrableServices/*'
        tags: [ { name: 'app.registry.item', registry:'MyRegistryClassName' }]
```