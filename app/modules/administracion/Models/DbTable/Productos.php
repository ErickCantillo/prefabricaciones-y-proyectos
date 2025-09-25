<?php 
/**
* clase que genera la insercion y edicion  de Productos en la base de datos
*/
class Administracion_Model_DbTable_Productos extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'productos';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'id';

	/**
	 * insert recibe la informacion de un Productos y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$titulo = $data['titulo'];
		$descripcion = $data['descripcion'];
		$imagen = $data['imagen'];
		$query = "INSERT INTO productos( titulo, descripcion, imagen) VALUES ( '$titulo', '$descripcion', '$imagen')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un Productos  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$titulo = $data['titulo'];
		$descripcion = $data['descripcion'];
		$imagen = $data['imagen'];
		$query = "UPDATE productos SET  titulo = '$titulo', descripcion = '$descripcion', imagen = '$imagen' WHERE id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}