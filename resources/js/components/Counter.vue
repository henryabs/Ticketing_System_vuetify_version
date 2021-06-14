<template>
    <div>
        
        <v-row>
            
                <v-col v-for="(counter, index) in counters" :key="index" :class="`${counter.background}`">
                    <router-link :to="{name: `${counter.link}`}">

                    <v-card
                        class="mx-auto"
                        outlined dark :color="`${counter.color}`"
                    >
                        <v-list-item three-line>
                        <v-list-item-content>
                            
                            <v-list-item-title class="text-h4 mb-1">
                            {{counter.label}}
                            </v-list-item-title>
                            
                        </v-list-item-content>

                        <v-list-item-avatar
                            tile
                            size="80"
                    
                        ><span class="text-h4">{{counter.count}}</span></v-list-item-avatar>
                        </v-list-item>

                        <v-card-actions>
                        <v-btn
                            outlined
                            rounded
                            text
                            lowercase
                        >
                            <v-icon>link</v-icon>
                            
                        </v-btn>
                        </v-card-actions>
                    </v-card>

                    </router-link>
                </v-col>
                
        </v-row>
    </div>
</template>
<script>

export default {
    data(){
        return {
            counters: [
                {label: 'All', count: null, color: 'pink', link: 'dashboard'},
                {label: 'Open', count: null, color: 'success', link: 'open'},
                {label: 'Unassigned', count: null, color: 'primary', link: 'unassigned'},
                {label: 'Unresolved', count: null, color: 'warning', link: 'unresolved'},
                {label: 'Closed', count: null, color: 'red', link: 'closed'},
            ],
        }
    },
    created(){
    this.apiDomain = location.host
    this.allTicketCount();
    this.openTicketCount();
    this.unassignedTicketCount();
    this.unresolvedTicketCount();
    this.closedTicketCount();
    },
    methods: {
        allTicketCount(){
            axios.get(`http://${this.apiDomain}/api/tickets`)
            .then(response => {
                this.counters[0].count = response.data.count
            });
        },
        openTicketCount(){
            axios.get(`http://${this.apiDomain}/api/tickets/open`)
            .then(response => {
                this.counters[1].count = response.data.count
            });
        },
        unassignedTicketCount(){
            axios.get(`http://${this.apiDomain}/api/tickets/unassigned`)
            .then(response => {
                this.counters[2].count = response.data.count
            });
        },
        unresolvedTicketCount(){
            axios.get(`http://${this.apiDomain}/api/tickets/unresolved`)
            .then(response => {
                this.counters[3].count = response.data.count
            });
        },
        closedTicketCount(){
            axios.get(`http://${this.apiDomain}/api/tickets/closed`)
            .then(response => {
                this.counters[4].count = response.data.count
            });
        }
    }
}
</script>
