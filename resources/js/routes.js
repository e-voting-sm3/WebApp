import CreateCandidate from './components/pages/CandidateComponent.vue'
import VotePage from './components/pages/VoteComponent.vue'
import ResultPage from './components/pages/ResultComponent.vue'
// import DashboardPage from './components/pages/DashboardComponent.vue'
import LoginPage from './components/pages/LoginComponent.vue'
import RegisterPage from './components/pages/RegisterComponent.vue'
import TableCandidatePage from './components/pages/TableCandidate.vue'
import TableVoterPage from './components/pages/TableVoter.vue'
import UpdateCandidate from './components/pages/UpdateCandidate.vue'

import TimingVote from './components/pages/TimingComponent.vue'
import SetTime from './components/pages/SetTimeComponent.vue'

export const routes = [
    {
        path: "/createcandidate",
        name: 'candidate',
        component: CreateCandidate 
    },
    {
        path: "/updatecandidate",
        name: 'updatecandidate',
        component: UpdateCandidate 
    },

    {
        path: "/vote",
        name: 'vote',
        component: VotePage
    },
    {
        path: "/result",
        name: 'result',
        component: ResultPage
    },
    {
        path: "/",
        name: 'login',
        component: LoginPage
    },
    {
        path: "/register",
        name: 'register',
        component: RegisterPage
    },
    {
        path: "/candidate",
        name: 'tablecandidate',
        component: TableCandidatePage
    },
    {
        path: "/voter",
        name: 'tablevoter',
        component: TableVoterPage
    },
    {
        path:"/time",
        name:"time",
        component: TimingVote
    },
    {
        path:"/settime",
        name:"settime",
        component: SetTime
    },
]