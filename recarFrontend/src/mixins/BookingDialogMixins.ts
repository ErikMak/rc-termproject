import {reactive} from 'vue';
interface DialogState {
    showDialog: boolean;
}

export class UseBookingDialog {
    state: DialogState;

    constructor() {
        this.state = reactive<DialogState>({
            showDialog: false,
        });
    }

    getShowDialog() : boolean {
        return this.state.showDialog
    }

    getValueFromChild(val: boolean) {
        this.state.showDialog = val;
    }

    toggleDialog() : void {
        this.state.showDialog = !this.state.showDialog;
    }
}