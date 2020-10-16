## pinpoint-in-workerman (experimentation)

## Steps


### 1. Download plugins from pinpoint-c-agent

### 2. Make it works

#### 2.1 app/http-server

1. copy `Plugins` into root
2. composer update
3. cp `Plugins/Framework/workerman/setting.ini` into root
4. run `php run_server.php start`

> Note:
> Due to lack of request-context implementation, the `callstack` could be confused within untested event switching.