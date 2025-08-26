<div style="width: 100%; background: #6e6e6e20; padding: 50px; font-size: 15px;">
  <table style="max-width: 600px; background: #FFF; border: 2px solid #192a4b; margin: auto; padding: 20px;">
    <tr>
      <td style="border-bottom: 2px solid #192a4b;">
        <img src="https://alobiencs.com/assets/LogoALBien.png" alt="Logo ALBien" height="100"
          style="display:block; margin:auto; margin-bottom:10px">
      </td>
    </tr>
    <tr>
      <td style="padding: 10px 20px; padding-bottom: 20px;">
        <span style="color: #202020;">
          Se ha enviado una consulta con los siguientes datos:
        </span>
      </td>
    </tr>
    <tr>
      <td style="padding: 3px 20px;">
        <span style="color: #6e6e6e;">
          <b>
            Nombres y Apellidos:
          </b>
          <?php echo $this->data['name'] ?>
        </span>
      </td>
    </tr>
    <tr>
      <td style="padding: 3px 20px;">
        <span style="color: #6e6e6e;">
          <b>
            Correo electrónico:
          </b>
          <?php echo $this->data['email'] ?>
        </span>
      </td>
    </tr>
    <tr>
      <td style="padding: 3px 20px;">
        <span style="color: #6e6e6e;">
          <b>
            Celular:
          </b>
          <?php echo $this->data['phone'] ?>
        </span>
      </td>
    </tr>
    <tr>
      <td style="padding: 3px 20px;">
        <span style="color: #6e6e6e;">
          <b>
            Motivo:
          </b>
          <?php echo $this->data['reason'] ?>
      </td>
    </tr>
    <tr>
      <td style="padding: 3px 20px; padding-bottom: 30px;">
        <span style="color: #6e6e6e;">
          <b>
            Mensaje:
          </b>
          <?php echo $this->data['message'] ?>
      </td>
    </tr>
  </table>
</div>