import VueRouter from 'vue-router';
import Notfound from './pages/Notfound';
import Dashboard from './pages/Dashboard';
import OpenTickets from './pages/OpenTickets';
import UnassignedTickets from './pages/UnassignedTickets';
import UnresolvedTickets from './pages/UnresolvedTickets';
import ClosedTickets from './pages/ClosedTickets';
import Logs from './pages/Logs';
import Top_issues from './reports/Top_issues';
import Agent_reports from './reports/Agent_reports';
import Ticket_reports from './reports/Ticket_reports';
import TicketItem from './pages/TicketItem';
const routes = [
    {
        path: '*',
        component: Notfound,
        name: 'notfound'
    },
    {
        path: '/',
        component: Dashboard,
        name: 'dashboard'
    },
    {
        path: '/tickets/open',
        component: OpenTickets,
        name: 'open'
    },
    {
        path: '/tickets/unassigned',
        component: UnassignedTickets,
        name: 'unassigned'
    },
    {
        path: '/tickets/unresolved',
        component: UnresolvedTickets,
        name: 'unresolved'
    },
    {
        path: '/tickets/closed',
        component: ClosedTickets,
        name: 'closed'
    },
    {
        path: '/logs',
        component: Logs,
        name: 'logs'
    },
    {
        path: '/top_issues',
        component: Top_issues,
        name: 'top_issues'
    },
    {
        path: '/agent_reports',
        component: Agent_reports,
        name: 'agent_reports'
    },
    {
        path: '/ticket_reports',
        component: Ticket_reports,
        name: 'ticket_reports'
    },
    {
        path: '/ticket/:id',
        component: TicketItem,
        name: 'ticket_item'
    },
];

const router = new VueRouter({
    routes,
    mode: 'history'
  });

  export default router;