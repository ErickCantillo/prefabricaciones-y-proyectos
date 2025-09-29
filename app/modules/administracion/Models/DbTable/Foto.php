<?php 
/**
* clase que genera la insercion y edicion  de Foto en la base de datos
*/
class Administracion_Model_DbTable_Foto extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'fotos';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'id';

	/**
	 * insert recibe la informacion de un Foto y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$galeria_id = $data['galeria_id'];
		$foto_titulo = $data['foto_titulo'];
		$foto_descripcion = $data['foto_descripcion'];
		$foto_path = $data['foto_path'];
		$query = "INSERT INTO fotos( galeria_id, foto_titulo, foto_descripcion, foto_path) VALUES ( '$galeria_id', '$foto_titulo', '$foto_descripcion', '$foto_path')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un Foto  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$galeria_id = $data['galeria_id'];
		$foto_titulo = $data['foto_titulo'];
		$foto_descripcion = $data['foto_descripcion'];
		$foto_path = $data['foto_path'];
		$query = "UPDATE fotos SET  galeria_id = '$galeria_id', foto_titulo = '$foto_titulo', foto_descripcion = '$foto_descripcion', foto_path = '$foto_path' WHERE id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}