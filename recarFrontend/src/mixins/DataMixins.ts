const DataMixins = {
    methods: {
        previewPic(img: string) {
            return `../../src/assets/cars/${img}`
        },
        mainPic(img: string) {
            return `../src/assets/cars/${img}`
        },
        itemFlag(img: string) {
            return `../../src/assets/flags/${img}`
        },
        toIsoString(date: any) {
            let tzo = -date.getTimezoneOffset(),
                dif = tzo >= 0 ? '+' : '-',
                pad = function(num: any) {
                    return (num < 10 ? '0' : '') + num;
                };

            return date.getFullYear() +
                '-' + pad(date.getMonth() + 1) +
                '-' + pad(date.getDate()) +
                'T' + pad(date.getHours()) +
                ':' + pad(date.getMinutes()) +
                ':' + pad(date.getSeconds()) +
                dif + pad(Math.floor(Math.abs(tzo) / 60)) +
                ':' + pad(Math.abs(tzo) % 60);
        },
    },
}

export default DataMixins