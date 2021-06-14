<template>
    <div>
        <v-container fluid>
            <counter></counter>
              <v-layout row v-for="(item, index) in items" :key="index" class="ma-0 pa-1">
                    <router-link :to="{name: 'dashboard'}">
                      <v-list>
                        <v-list-item>
                          <v-list-item-avatar>
                            <img :src="`https://ui-avatars.com/api/?color=fff&background=random&size=64&name=${item.requestor_email}`" alt="">
                          </v-list-item-avatar>
                          <v-list-item-content>
                            <v-list-item-title>
                              <v-chip
                                class="ma-2"
                                label
                                text-color="white"
                                :color="chipColor(item.status.status_name)"
                              >
                                Ticket#{{item.id}} {{item.subject}} 
                              </v-chip>
                              {{item.created_at}}
                              </v-list-item-title>
                            <v-list-item-subtitle v-html="item.concern"></v-list-item-subtitle>
                            
                          </v-list-item-content>
                        </v-list-item>
                        
                      </v-list>
                    </router-link>
                    
              </v-layout>
              
        </v-container>
    </div>
</template>

<script>
import Counter from '../components/Counter.vue';
export default{
    data(){
        return {
            items: [],
        }
    },
    created(){
      this.apiDomain = location.host;
      this.fetchAllTickets();
      this.chipColor();
    },
    components: {
      Counter,
    },
    methods:{
      fetchAllTickets(){
        axios.get(`http://${this.apiDomain}/api/tickets/open`)
        .then(response => {
            this.items = response.data.data;
        });
      },
      chipColor(status){
        if(status == 'open') return "success"
        if(status == 'unassigned') return "primary"
        if(status == 'unresolved') return "warning"
        if(status == 'closed') return "red"
      }
    }
}
</script>

