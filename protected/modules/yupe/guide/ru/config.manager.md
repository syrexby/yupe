ConfigManager - компонент для управления конфигурационными файлами модулей
==========================================================================

**Автор**: [Комманда разработчиков Юпи!](http://yupe.ru/feedback/contact?from=docs)

**Версия**: 0.1 (dev)

**Авторское право**:  2009-2013 Yupe!

**Лицензия**: [BSD](https://github.com/yupe/yupe/blob/master/LICENSE)

Предисловие:
------------

Так как в Yupe используется слитие файлов конфигурации для модулей, при каждом запуске происходил поиск файлов,
их слитие и после чего уже сам запуск приложения. Это трудоёмкий процесс, который требует времени и ресурсов.
По данной причине мы написали специальный компонент, который единожды выполняет слитие файлов, кеширует их и в 
последующем использует полноценный массив настроек.

Запуск приложения первый раз:
-----------------------------

При запуске приложения первый раз, ConfigManager проводит слитие всех файлов-настроек, кеширует исходный массив
и сохраняет кешированный файл настроек. При последующих запусках компонент проверяет наличие кеша и загружает его.

Сброс кеша настроек:
--------------------

Сброс кеша настроек производится либо из админ-панели, либо удалением кеш-файла настроек. В случае когда вам необходимо
организовать очистку кеша настроек из своего модуля/компонента - потребуется вызвать следующий метод:

`application\modules\yupe\components\ConfigManager::flushDump();`

Для простого использования можно сделать немного иначе:
<pre><code class="bash">// В начале файла:
use application\modules\yupe\components\ConfigManager;

...

// В нужном месте:
ConfigManager::flushDump();
</code></pre>

Описание методов:
-----------------

* **merge** - Инициализируем компонент, настраиваем пути и принемаем необходимыей параметры:
* **getSettings** - Получение настроек из кеш-файла или, запускаем обработчик на создание массива настроек приложения:
* **cachedSettings** - Получаем массив настроек из файла-дампа:
* **dumpSettings** - Сброс дампа настроек в файл
* **prepareSettings** - Готовим настройки приложения
* **mergeSettings** - Сливаем настройки, кешируем и отдаём приложению
* **(static) flushDump** - Сброс кеш-файла настроек