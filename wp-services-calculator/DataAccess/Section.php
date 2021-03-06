<?php

namespace WSC\DataAccess;

/**
 * Class Section
 *
 * DataAccess раздела
 *
 * @author Vladimir Lyubar <admin@uclg.ru>
 * @package wp-services-calculator
 * @subpackage DataAccess
 */
class Section
{
    /**
     * Возвращает раздел по id
     * @param $id
     * @return array
     */
    public static function get($id)
    {
        $id = (int)$id;

        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}_WSC_sections WHERE id={$id}";
        return $wpdb->get_row($sql, ARRAY_A);
    }


    /**
     * Возвращает все разделы
     * @return array
     */
    public static function getAll()
    {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}_WSC_sections ORDER BY name";
        return $wpdb->get_results($sql, ARRAY_A);
    }


    /**
     * Сохраняет раздел
     */
    public static function save($id, $name)
    {
        $id = (int)$id;
        $name = mysql_real_escape_string($name);

        global $wpdb;

        $sql = "UPDATE {$wpdb->prefix}_WSC_sections SET name='{$name}' WHERE id={$id}";
        $wpdb->query($sql);
    }


    /**
     * Доавляет раздел с именем $name
     * @param $name
     */
    public static function add($name)
    {
        $name = mysql_real_escape_string($name);

        global $wpdb;

        $sql = "INSERT INTO {$wpdb->prefix}_WSC_sections (name) VALUES ('{$name}')";
        $wpdb->query($sql);
    }
}