<head>
<style>
    .main__btn {
    font-size: 1.0rem;
    /* background: #3c3ab4; */
    /* background: -webkit-linear-gradient(to right, #63739c, #1672db, #3613b3); */
    background: linear-gradient(to right, #63739c, #1672db, #3613b3);
    padding: 10px 20px;
    color:white;
    border: none;
    border-radius: 4px;
    margin-top: 2rem;
    cursor: pointer;
    position: relative;
    margin-left: 260px;
    transition: all 0.35s;
    outline: none;
    }
    .main__btn:hover {
    background:white;
    }
    .main__btn:after {
    position: absolute;
    /* content: ''; */
    
    /* background: #1005a7; */
    /* transition: all 0.35s; */
}
    #addform{
      margin-top:1rem;
      position: flex;
      width:300px;
      margin-left:265px;
      z-index: -1;
      border: 5px solid rgb(146, 136, 136);
      border-radius: 10px;
      background-color: rgba(202, 238, 224, 0.5);

        }
    .coursename2{

      margin-left:20px;
      /* background:wheat; */
      width:120px;
      border-radius: 4px;
      margin-top:0rem;
      padding: 7px 5px;
      font-family: 'Kumbh Sans', sans-serif;
      font-size: 0.97em;
      font-weight:bold;
      /* background: -webkit-linear-gradient(to right, #63739c, #1672db, #3613b3); */
      /* color:white; */
    }
    .coursename22{
      margin-left:20px;
      /* background:wheat; */
      width:120px;
      border-radius: 4px;
      padding: 7px 5px;
      font-family: 'Kumbh Sans', sans-serif;
      font-size: 0.97em;
      font-weight:bold;
      /* background: -webkit-linear-gradient(to right, #63739c, #1672db, #3613b3); */
      /* color:white; */
    }
    .topic {
    font-size: 1.0rem;
    background: #3a98b4;
    background: -webkit-linear-gradient(to right, #63739c, #6a819c, #8062e0);
    background: linear-gradient(to right, #7f828a, #69a1e0, #5b43b3);
    padding: 5px 5px;
    border: none;
    border-radius: 4px;
    margin-top: 2rem;
    cursor: pointer;
    position: relative;
    margin-left: 20px;
    transition: all 0.35s;
    outline: none;
}
    .submit {
    font-size: 1.0rem;
    background: #77f181;
    color:white;
    /* background: -webkit-linear-gradient(to right, #1cf126, #126d29, #4feb69); */
    background: linear-gradient(to right, #63739c, #1672db, #3613b3);
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    margin-top: 2rem;
    margin-bottom:1.5rem;
    cursor: pointer;
    position: relative;
    margin-left: 20px;
    transition: all 0.35s;
    outline: none;
}
  .add {
    font-size: 1.0rem;
    background: #deddf8;
    background: -webkit-linear-gradient(to right, #f0f2f5, #ecf0f5, #bcb7cf);
    background: linear-gradient(to right, #afb7cc, #d8dde2, #e3e1ec);
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    margin-top: 0rem;
    cursor: pointer;
    position: relative;
    margin-left: 20px;
    transition: all 0.35s;
    outline: none;
  }
  .addtopic {
    font-size: 1.0rem;
    background: #deddf8;
    background: -webkit-linear-gradient(to right, #f0f2f5, #ecf0f5, #bcb7cf);
    background: linear-gradient(to right, #afb7cc, #d8dde2, #e3e1ec);
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    margin-top: 0rem;
    cursor: pointer;
    position: relative;
    margin-left: 20px;
    transition: all 0.35s;
    outline: none;
}

  </style>

</head>
<!-- table section -->
<table class="content-table">

<thead>
    <tr>
      <th>resturant Name</th>
      <th>address</th>
      <th>openTime(H)</th>
      <th>closeTime(H)</th>
      <th>Edit</th>
      <th> Delete </th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($array[0]); $i++) { ?>

      <tr>
        <td><?php echo $array[0][$i]->name; ?></td>
        <td><?php echo $array[0][$i]->address; ?></td>
        <td><?php echo $array[0][$i]->openTime; ?></td>
        <td><?php echo $array[0][$i]->closeTime; ?></td>
        <td> <a href="<?php echo URL . 'resturant/prepareToUpdateResturant/' . $array[0][$i]->rid ?>" title="Go Down"><i class='bx bx-cog'></i></a></td>
        <td><a   href="<?php echo URL . 'resturant/deleteResturant/' . $array[0][$i]->rid ?>" class="btn_del"><i id="deltbtn" class='bx bx-cart-alt'></i></a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>

  <form method="post" id="addform" action="<?php echo URL . 'resturant/updateResturant/' . $resturant_id; ?>">
</br>
<p class="coursename2"> res Name :</p><br>
<br>
<?php for ($i = 0; $i < count($array[1]); $i++) { ?>
    <input id="coursename" class="add" type="text" name="resturantname" placeholder="Resturant name" size="15" required value="<?php echo $array[1][$i]->name; ?>" />
      <p class="coursename2"> Res address:</p>
      <input id="coursename" class="add" type="text" name="resturantaddress" placeholder="Resturant address" size="15" required value="<?php echo $array[1][$i]->address; ?>" />
      <p class="coursename2"> openTime:</p>
      <input  id="coursename" class="add" type="time" name="openTime" placeholder="openTime" size="15" required value="<?php echo $array[1][$i]->openTime; ?>"/>
      <p class="coursename2">closeTime:</p>
      <input  id="coursename" class="add" type="time" name="closeTime" placeholder="closeTime" size="15" required value="<?php echo $array[1][$i]->closeTime; ?>"/>
    <br>
    <?php } ?>
    <input  id="submit_btn" class="submit" type="submit" placeholder="Course name" size="15" />
<br>
  </form>
  <br><br><br>
