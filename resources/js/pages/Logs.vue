<template>
    <div>
        <v-list>
        <v-list-item class="info ma-1 pa-1"
            v-for="item in items"
            :key="item.message"
        >

            <v-list-item-content>
            Type: {{item.type}}
            <v-list-item-title v-text="item.message"></v-list-item-title>
            </v-list-item-content>

            <v-list-item-action>
            {{item.created_at}}
            </v-list-item-action>
        </v-list-item>
        </v-list>
    </div>
</template>

<script>
export default{
    data () {
      return {
        items: [],
      }
    },
    created(){
        this.apiDomain = location.host;
        this.fetchAllLogs();
    },
    methods:{
        fetchAllLogs(){
            axios.get(`http://${this.apiDomain}/api/logs`)
            .then(response => {
                this.items = response.data.data;
            });
        }
    }
}
</script>
