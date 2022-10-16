<template>
  <div class="mainFlex">
    <div class="navflex"> <!-- Navbar -->
      <div class="navOverskriftBoks">
        <img class="navbarBillede" src="../../public/lægehus ikon.png" alt="ikon af en læge">
        <h1 class="navOverskrift">Klinikken</h1>
      </div>
      <div>
        <p>Medicin Journal</p>
      </div>
      <div>
        <p>Tildel doktor til patient</p>
      </div>
      <div>
        <p>lorem ipsum</p>
      </div>
      <div>
        <p>lorem ipsum</p>
      </div>
      <div>
        <p>lorem ipsum</p>
      </div>
    </div>

    <div class="mainBoks70">
      <h2 class="mainOverskrift">Tildel doktor til patient</h2>

      <h3 class="patiantOverskrift">Patient</h3>

      <div class="patiantOuterBox">
        <div class="pataintBoks">
          <div class="pataintInnerBoks">
            <p class="patanitInnerBoksText">Navn</p>
          </div>
          <div class="pataintInnerBoks">
            <p class="patanitInnerBoksText">CPR-nr</p>
          </div>
        </div>
        <div class="pataintBoks">
          <div class="pataintInnerBoks">
            <p class="patanitInnerBoksText">anne-katrine</p>
          </div>
          <div class="pataintInnerBoks">
            <p class="patanitInnerBoksText">1234567890</p>
          </div>
        </div>
      </div>

      <div class="selectOuterBoks">
        <div>
          <h3 class="selectOverskrift">Vælg Læge</h3>
          <select>
            <option>læge 1</option>
            <option>læge 2</option>
            <option>læge 3</option>
            <option>læge 4</option>
          </select>
        </div>
        <div>
          <button class="selectButtom">Tildel</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "assign-docter-to-patiant",
  data(){
    return{

    }
  },
  created(){

  },
  methods:{

  }
}
</script>

<style>
  p, h1, h2, h3, option{
    color: #000;
  }

  select{
    width: 90em;
    padding: 0.2em;
    margin-bottom: 1em;
  }

/*************************************/
/*               NAVBAR              */
/*************************************/
  .navflex{
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    align-items: flex-start;

    flex: 20;
    border: 1px solid #000;
    padding: 0.5em 0;
    height: 100%;
    min-height: 43.9em;
  }

  .navOverskriftBoks{
    display: flex;
    flex-flow: row nowrap;
    align-items: center;
  }

  .navOverskrift{
    font-size: 2.5em;
  }

  .navbarBillede{
    height: 5em;
    width: 5em;
  }

  .navflex div{
    width: 88.4%;
    text-align: left;
    padding: 0.5em 1em;

  }

  .navflex div:hover{
    background-color: #f2f2f2;
  }

/************************************************************/
/*               MAIN                                       */
/************************************************************/
  .mainFlex{
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
  }

  .mainBoks70{
    display:  flex;
    flex-flow: column nowrap;
    align-items: flex-start;
    
    flex: 80%;
    padding: 1em;
  }

  .mainOverskrift{
    font-size: 1.5em;
  }

/*************************************/
/*               TABEL               */
/*************************************/
  .patiantOverskrift{
    padding-top: 1em;
  }

  .patiantOuterBox{
    display: flex;
    flex-flow: column nowrap;
    
    border: 1px solid #000;
    margin:0.5em 0 1em 0;
    width: 75em;
    height: 30em;
  }

  .pataintBoks{
    display: flex;
    flex-flow: row nowrap;
    justify-content: flex-start;
    text-align: left;
  }

  .pataintInnerBoks{
    flex: 50%;
    border: 1px solid #000;
  }

  .patanitInnerBoksText{
    padding: 0.3em 1em;
  }

/*************************************/
/*               SELECT              */
/*************************************/
  .selectOuterBoks{
   display: flex;
   flex-flow: column nowrap;
   align-items: flex-end; 
  }

  .selectOverskrift{
    text-align: left;
    margin-bottom: 0.5em;
  }

  .selectButtom{
    padding: 0.4em 5em;
    background-color: inherit;
    border: 1px solid #000;
    border-radius: 10px;
  }
</style>