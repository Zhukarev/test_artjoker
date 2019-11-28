<?php


class Db
{

    private static $instance = null;  // экземпляр объекта

    /**
     * @var PDO
     */
    private $pdo = false;

    /**
     * Возвращает единственный экземпляр класса
     * @return DB
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Подключаемся к БД
     */
    public function connect($dsn, $dbuser, $dbpassword, $opt)
    {
        try {
            $this->pdo = new PDO($dsn, $dbuser, $dbpassword, $opt);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Получить ссылку на PDO
     * @return boolean
     */
    public function get_pdo()
    {
        if ($this->pdo instanceof PDO) {
            return $this->pdo;
        }
        return false;
    }

    /**
     * Закрываем соединение с БД
     */
    public function close()
    {
        $this->pdo = null;
    }

}

/**
 * Параметры для подключения к БД
 */
$host = 'localhost';
$dbname = 'artjoker';
$charset = 'utf8';

$dbuser = 'root';
$dbpassword = '111';

$opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

$dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";


/**
 * подключение к БД
 */
try {
    DB::getInstance()->connect($dsn, $dbuser, $dbpassword, $opt);
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

