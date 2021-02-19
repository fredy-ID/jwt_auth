import axios from 'axios';
import authHeader from '../../services/authHeader';
export default {
  name: 'modalAddClient',
  data: () => ({
    dialog: false,
    valid: false,
    new_client: true,
    name: '',
    firstname: '',
    nameRules: [
      v => !!v || 'Veuillez saisir le nom du Client',
      v => (v && v.length <= 40) || 'Nom doit être inférieur à 40 characters',
    ],
  }),
//   created() {
//     this.valid = false
//   },
  methods: {
    close() {
      this.$emit('update:dialog', false)
    },
    validate (event) {
        event.preventDefault();  
        let composant = this      
        this.$refs.form.validate()
        let data = { nom: this.name, prenom: this.firstname, headers: authHeader()}
        axios.post('http://localhost:8000/api/auth/clients/addclient', data)
        .then(function (response) {
            composant.$emit("dataForParent",response.data.data)
          console.log(response.data.data);
        })
        .catch(function (error) {
         console.log(error);
        });
        //   this.$refs.form.validate()
        this.dialog = false
    }
  },
}