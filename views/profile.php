<?php  /* @var $this \evuru\chintuaphpmvc\View */ $this->title = 'Profile'; ?>

<div class="row d-flex">
    <div id="gradient" class="d-flex justify-content-center ">
        <div id="card">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/43604/profile/profile-512_1.jpg"/>
            <h2>Ondřej Page Bárta</h2>
            <p>Student of IT in Czech republic.</p>
            <p>Interested in Web technologies like HTML5, CSS3, JavaScript, PHP, MySQL, etc.</p>
            <p>Love Codepen.io and respect Chris Coyier. ;)</p>
            <span class="left bottom">tel: 731 366 ***</span>
            <span class="right bottom">adress: Czech Republic</span>
        </div>
    </div>
</div>

<style>


#gradient {
  background: #999955;
  background-image: linear-gradient(#DAB046 20%, #D73B25 20%, #D73B25 40%, #C71B25 40%, #C71B25 60%, #961A39 60%, #961A39 80%, #601035 80%);
  margin: 0 auto;
  height: 150px;
    width: 560px;
}



#card {
  width: 450px;
  height: 225px;
  padding: 25px;
  padding-top: 0;
  padding-bottom: 0;
  background: #E9E2D0;
  box-shadow: -20px 0 35px -25px black, 20px 0 35px -25px black;
  z-index: 5;
}

#card img {
  width: 150px;
  float: left;
  border-radius: 5px;
  margin-right: 20px;
  -webkit-filter: sepia(1);
  -moz-filter: sepia(1);
  filter: sepia(1);
}

#card h2 {
  font-family: courier;
  color: #333;
  margin: 0 auto;
  padding: 0;
  font-size: 15pt;
}

#card p {
  font-family: courier;
  color: #555;
  font-size: 13px;
}

#card span {
  font-family: courier;
}
</style>