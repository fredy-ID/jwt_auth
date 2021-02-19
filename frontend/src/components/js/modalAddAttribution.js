
import { post } from "lodash"
import axios from 'axios';
import authHeader from '../../services/authHeader';
import modalAddClient from "../views/ModalAddClient.vue"

export default {
  components:{
    modalAddClient,
  },
  props: {
    dialog: {}
  },  
  data(){
    return {
        loading: false,
        items: [],
        search: null,
        selectedClient: null,
        idClient: "",     
           
    }
  },
  watch: {
    search (val) {
      // console.log(this.selectedClient)
      val && val !== this.selectedClient && this.querySelections(val)
    },
  },
  methods: {
    close() {
      this.$emit('update:dialog', false)
    },
    addAttribution(){

      console.log(" Client :",this.selectedClient)
      this.close()
    },
    querySelections (v) {
      this.loading = true
      // Simulated ajax query
      if(v.length >= 3){
        let data = { word: v, headers: authHeader()}
        axios.post('http://localhost:8000/api/auth/clients', data)
        .then(response => {
          setTimeout(() => {
            this.items = response.data.data.map(data => {
              this.idClient = data.idClient
              return data.nom+ " "+ data.prenom
            })
            this.loading = false
          }, 500)
        })

      } 
    },
    recupData(event){
        this.selectedClient.push(event)
    },
  }
}