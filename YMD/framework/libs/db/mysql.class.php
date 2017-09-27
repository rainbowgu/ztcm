<?php

class mysql
{

    /**
     * ������
     *
     * @param string $error            
     */
    function err($error)
    {
        die("�Բ������Ĳ������󣬴���ԭ��Ϊ��" . $error); // die���������� ��� �� ��ֹ �൱�� echo �� exit �����
    }

    /**
     * �������ݿ�
     *
     * @param string $dbhost
     *            ������
     * @param string $dbuser
     *            �û���
     * @param string $dbpsw
     *            ����
     * @param string $dbname
     *            ���ݿ���
     * @param string $dbcharset
     *            �ַ���/����
     * @return bool ���ӳɹ��򲻳ɹ�
     *        
     */
    function connect($config)
    {
        extract($config);
        if (! ($con = mysql_connect($dbhost, $dbuser, $dbpsw))) { // mysql_connect�������ݿ⺯��
            $this->err(mysql_error());
        }
        if (! mysql_select_db($dbname, $con)) { // mysql_select_dbѡ���ĺ���
            $this->err(mysql_error());
        }
        mysql_query("set names " . $dbcharset); // ʹ��mysql_query ���ñ��� ��ʽ��mysql_query("set names utf8")
    }

    /**
     * ִ��sql���
     *
     * @param string $sql            
     * @return bool ����ִ�гɹ�����Դ��ִ��ʧ��
     */
    function query($sql)
    {
        if (! ($query = mysql_query($sql))) { // ʹ��mysql_query����ִ��sql���
            $this->err($sql . "<br />" . mysql_error()); // mysql_error ����
        } else {
            return $query;
        }
    }

    /**
     * �б�
     *
     * @param source $query
     *            sql���ͨ��mysql_query ִ�г�������Դ
     * @return array �����б�����
     *        
     */
    function findAll($query)
    {
        while ($rs = mysql_fetch_array($query, MYSQL_ASSOC)) { // mysql_fetch_array��������Դת��Ϊ���飬һ��ת����һ�г���
            $list[] = $rs;
        }
        return isset($list) ? $list : "";
    }

    /**
     * ����
     *
     * @param source $query
     *            sql���ͨ��mysql_queryִ�г���������Դ
     *            return array ���ص�����Ϣ����
     *            
     */
    function findOne($query)
    {
        $rs = mysql_fetch_array($query, MYSQL_ASSOC);
        return $rs;
    }

    /**
     * ָ���е�ָ���ֶε�ֵ
     *
     * @param source $query
     *            sql���ͨ��mysql_queryִ�г���������Դ
     *            return array ����ָ���е�ָ���ֶε�ֵ
     *            
     */
    function findResult($query, $row = 0, $filed = 0)
    {
        $rs = mysql_result($query, $row, $filed);
        return $rs;
    }

    /**
     * ��Ӻ���
     *
     * @param string $table
     *            ����
     * @param array $arr
     *            ������飨�����ֶκ�ֵ��һά���飩
     *            
     */
    function insert($table, $arr)
    {
        // $sql = "insert into ����(����ֶ�) values(���ֵ)";
        foreach ($arr as $key => $value) { // foreachѭ������
            $value = mysql_real_escape_string($value);
            $keyArr[] = "`" . $key . "`"; // ��$arr���鵱�еļ������浽$keyArr���鵱��
            $valueArr[] = "'" . $value . "'"; // ��$arr���鵱�еļ�ֵ���浽$valueArr���У���Ϊֵ��Ϊ�ַ�������sql�������insert�������ֵ���ַ����Ļ�Ҫ�ӵ����ţ���������ط�Ҫ���ϵ�����
        }
        $keys = implode(",", $keyArr); // implode�����ǰ�������ϳ��ַ��� implode(�ָ���������)
        $values = implode(",", $valueArr);
        $sql = "insert into " . $table . "(" . $keys . ") values(" . $values . ")"; // sql�Ĳ������ ��ʽ��insert into ��(����ֶ�)values(���ֵ)
        $this->query($sql); // �����������query(ִ��)����ִ������sql��� ע��$thisָ������
        return mysql_insert_id();
    }

    /**
     * �޸ĺ���
     *
     * @param string $table
     *            ����
     * @param array $arr
     *            �޸����飨�����ֶκ�ֵ��һά���飩
     * @param string $where
     *            ����
     *            
     */
    function update($table, $arr, $where)
    {
        // 
        foreach ($arr as $key => $value) {
            $value = mysql_real_escape_string($value);
            $keyAndvalueArr[] = "`" . $key . "`='" . $value . "'";
        }
        $keyAndvalues = implode(",", $keyAndvalueArr);
        $sql = "update " . $table . " set " . $keyAndvalues . " where " . $where; // �޸Ĳ��� ��ʽ update ���� set �ֶ�=ֵ where ����
        $this->query($sql);
    }

    /**
     * ɾ������
     *
     * @param string $table
     *            ����
     * @param string $where
     *            ����
     *            
     */
    function del($table, $where)
    {
        $sql = "delete from " . $table . " where " . $where; // ɾ��sql��� ��ʽ��delete from ���� where ����
        $this->query($sql);
    }
}

?>