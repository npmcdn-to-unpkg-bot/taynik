<?php namespace system\core;

use system\helpers\Filter;
use system\helpers\Settings;

class Db {

    private static $instance;
    private $db;

    private function __construct()
    {

        setlocale(LC_ALL, Settings::get('db', 'db_charset'));

        $this->db = new \mysqli(

            Settings::get('db', 'db_host'),
            Settings::get('db', 'db_login'),
            Settings::get('db', 'db_pass'),
            Settings::get('db', 'db_name')

        )

        or die('No connect with data base' . mysqli_error($this->db));

        mysqli_query($this->db, 'SET NAMES ' . Settings::get('db', 'db_charset'))
            or die(mysqli_error($this->db));

    }

//    private function __destruct()
//    {
//        $this->disconnect();
//    }

    public static function init ()
    {

        if (self::$instance instanceof self)
        {

            return false;

        }

        self::$instance = new \system\core\Db();

    }

    /////////////////////////////////

    /**
     * @param $table
     * @param $where
     * @param null $sort
     * @param null $limit_start
     * @param null $limit_count
     * @return array|bool
     *
     * Выборка
     *
     */
    public static function select($table, $where = 1, /*Сортировка*/$sort = null, $limit_start = null, $limit_count = null)
    {

        if(empty($table) || empty($where)) return false;

        $table = Settings::get('db', 'db_prefix') . $table;

        //-------------------------------------------------

        if ($where != 1)
        {

            $wh = array();

            foreach($where as $key => $value)
            {

                $value = Filter::fQuote(self::$instance->db, $value);

                $wh[] = $key . '=' . $value ;

            }

            $where = implode(' AND ', $wh);

        }

        //--------------------------------------------------

        if($sort !== null)
        {

            $sort = "ORDER BY $sort DESC";

        }
        //--------------------------------------------------

        if($limit_start !== null && $limit_count !== null)
        {

            $limit = "LIMIT $limit_start, $limit_count";

        }else $limit = null;
        //--------------------------------------------------

        $data = array();

        if($query = mysqli_query(self::$instance->db, "SELECT * FROM $table WHERE $where $sort $limit"))
        {

            while($row = mysqli_fetch_assoc($query))
            {

                $data[] = $row;

            }

            return $data;

        }
        else return mysqli_error(self::$instance->db);

    }

    /**
     * @param $table
     * @param array $data
     * @return int|string|void
     *
     * Вставка
     *
     */
    public static function insert($table, array $data)
    {

        if(empty($table) || empty($data)) return false;

        $table = Settings::get('db', 'db_prefix') . $table;

        if(is_array($data))
        {

            $keys   = array();
            $values = array();

            foreach($data as $key => $value)
            {

                $keys[]   = $key;
                $values[] = Filter::fQuote(self::$instance->db, $value);

            }

            $keys   = '('. implode(',', $keys) . ')';
            $values = '('. implode(',', $values) . ')';

            if(!mysqli_query(self::$instance->db, "INSERT INTO $table $keys VALUES $values"))
            {

                return mysqli_error(self::$instance->db);

            }

            return mysqli_insert_id(self::$instance->db);
        }

    }

    /**
     * @param $table
     * @param array $where
     * @return bool
     *
     * Удаление
     *
     */
    public static function delete($table, array $where)
    {

        if(empty($table) || empty($where)) return false;

        $table = Settings::get('db', 'db_prefix') . $table;

        //-------------------------------------------------
        $wh = array();

        foreach($where as $key => $value)
        {

            $value = Filter::fQuote(self::$instance->db, $value);

            $wh[] = $key . '=' . $value;

        }

        $where = implode(' AND ', $wh);
        //--------------------------------------------------

        if(!mysqli_query(self::$instance->db, "DELETE FROM $table WHERE $where"))
        {

            return false;

        }

        return true;

    }

    /**
     * @param $table
     * @param array $where
     * @param array $data
     * @return bool
     *
     * Редактирование
     *
     */
    public static function edit($table, array $where, array $data)
    {

        if(empty($table) || empty($where) || empty($data)) return false;

        $table = Settings::get('db', 'db_prefix') . $table;

        //-------------------------------------------------
        $wh = array();

        foreach($where as $key => $value)
        {

            $value = Filter::fQuote(self::$instance->db, $value);

            $wh[] = $key . '=' . $value;

        }

        $where = implode(' AND ', $wh);
        //--------------------------------------------------

        $dt = array();

        foreach ($data as $key => $value)
        {

            $dt[] = $key . '=' . Filter::fQuote(self::$instance->db, $value);

        }

        $values = implode(',', $dt);
        //--------------------------------------------------

        if(!mysqli_query(self::$instance->db, "UPDATE $table SET $values WHERE $where"))
        {

            return false;

        }else return true;

    }

    public static function query ($query)
    {

        $data = array();

        if($query = mysqli_query(self::$instance->db, $query))
        {

            if ($query == 'boolean') return $query;
            else
            {

                while($row = mysqli_fetch_assoc($query))
                {

                    $data[] = $row;

                }

                return $data;

            }

        }
        else return mysqli_error(self::$instance->db);

    }

////////////////////////////////////////////////////////////////////////////////

} 