let view = new EditorView({
    extensions: [basicSetup, oneDark, javascript()],
    parent: document.querySelector("#editor"),
    // doc: 'function foo() { console.log(\"foo1\"); }\n foo(1);'
})

var text = ''

let view1 = new EditorView({
    extensions: [basicSetup, oneDark],
    parent: document.querySelector("#editor1"),
    // doc: text.toString()
})

$('#btn').click(function () {
    try {
        text = eval(view.state.doc.toString()).toString();
    } catch (error) {
        text = error.toString();
    }

    let old_text_length = view1.state.doc.toString().length;

    view1.dispatch({
        changes: { from: 0, to: old_text_length, insert: text }
    })
})