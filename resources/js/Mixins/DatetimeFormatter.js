import moment from 'moment';

export default {
    methods: {
        parseDateTimeToStartOf(datetime) {
            return moment(datetime).startOf('hour').fromNow();
        }
    }
}
