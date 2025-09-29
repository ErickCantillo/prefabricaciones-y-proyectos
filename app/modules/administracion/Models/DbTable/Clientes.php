<?php 
/**
* clase que genera la insercion y edicion  de Clientes en la base de datos
*/
class Administracion_Model_DbTable_Clientes extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'clientes';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'id';

	/**
	 * insert recibe la informacion de un Clientes y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$cliente_nombre = $data['cliente_nombre'];
		$cliente_descripcion = $data['cliente_descripcion'];
		$cliente_imagen = $data['cliente_imagen'];
		$query = "INSERT INTO clientes( cliente_nombre, cliente_descripcion, cliente_imagen) VALUES ( '$cliente_nombre', '$cliente_descripcion', '$cliente_imagen')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un Clientes  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$cliente_nombre = $data['cliente_nombre'];
		$cliente_descripcion = $data['cliente_descripcion'];
		$cliente_imagen = $data['cliente_imagen'];
		$query = "UPDATE clientes SET  cliente_nombre = '$cliente_nombre', cliente_descripcion = '$cliente_descripcion', cliente_imagen = '$cliente_imagen' WHERE id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}