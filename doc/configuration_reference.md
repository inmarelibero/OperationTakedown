Configuration Reference
===============

**OperationTakedown** includes the file ``/config/config.yml``, containing some configurations you can tweak to fit your needs.

Here is the configuration reference.

### /config/config.yml


    retry_after:
        
        # set false to ignore sending this header
        enabled: true
        
        # how many seconds the crawler should wait to return on your website
        seconds: 120