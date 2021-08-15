
class Changeanimation {
    constructor(name) {
        this.name = name;
    }
    bark() {
        console.log(`the cat named ${this.name} is barking !`);
    }
    static getitems() {
        this.bunki = true;
        this.page += 10;
        // ここでパラメータを渡してバックエンドと応答する。
        console.log('クラスからこんにちは');
        
        this.items = [
                      {id:'fv9Iz0CWpPk'},
                      {id:'HpdO5Kq3o7Y'},
                      {id:'QOjmvL3e7Lc'},
                      {id:'j8JNpKgVkuc'},
                      {id:'uhp-LKQIbno'},
                    ];
    }
}
module.exports = Changeanimation;
