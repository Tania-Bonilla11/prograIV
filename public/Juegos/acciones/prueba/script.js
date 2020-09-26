function _defineProperty(obj, key, value) {if (key in obj) {Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true });} else {obj[key] = value;}return obj;}const Component = React.Component;
const Transition = ReactTransitionGroup.Transition;
const TransitionGroup = ReactTransitionGroup.TransitionGroup;
const CSSTransition = ReactTransitionGroup.CSSTransition;

class Quiz extends React.Component {
  constructor(props) {
    super(props);_defineProperty(this, "triggerAnimation",

    bool => {
      this.setState({
        animate: bool });

    });_defineProperty(this, "getAnswer",

    (e, answer) => {
      console.log(answer === this.state.list[this.state.id].final, this.state.answer);
      this.setState({
        answer: [
        ...this.state.answer,
        answer === this.state.list[this.state.id].final],

        id: this.state.next,
        next: this.state.next + 1,
        finish: this.state.next + 1 > this.state.totalQuestion });


      window.scroll(0, 0);
    });this.state = { id: 0, answer: [], totalQuestion: 0, list: [], next: 1, finish: false, animate: true };}componentDidUpdate(prevProps, prevState) {if (this.state.id !== prevState.id) {this.setState({ animate: true });}}

  componentDidMount() {
    fetch(
    'data.json').

    then(data => data.json()).
    then(json => {
      this.setState({
        list: json,
        totalQuestion: json.length });

    });
  }

  render() {
    return !this.state.finish && this.state.list.length > 0 ?
    React.createElement(React.Fragment, null,
    React.createElement(Header, null),
    React.createElement("section", { className: "quiz" },
    React.createElement("div", { className: "quiz__image" },
    React.createElement("img", {
      src: `img/question.svg`,
      alt: "",
      className: this.state.animate ? 'fade-in' : '' })),


    React.createElement("div", { className: "quiz__wrapper" },
    React.createElement("div", { className: "quiz__question" },
    React.createElement("h2", null,
    this.state.list && this.state.list[this.state.id]['question'])),
    



    React.createElement(TransitionGroup, { className: "quiz__answer" },
    this.state.list &&
    this.state.list[this.state.id]['answer'].map((item, index) => {
      const delay = Math.max(0, index * 100);
      return (
        React.createElement(CSSTransition, {
          key: 'a' + this.state.id + ' ' + item,
          timeout: 400,
          classNames: "fade",
          unmountOnExit: true,
          onExited: () => {
            this.triggerAnimation(false);
          } },

        React.createElement("button", {
          onClick: e => this.getAnswer(e, index),
          key: 'a' + this.state.id + ' ' + item,
          className: "quiz__answer--item",
          style: { transitionDelay: `${delay}ms` } },

        item)));



    }))))) :






    React.createElement(React.Fragment, null,
    React.createElement(Header, null),
    React.createElement(Result, {
      answer: this.state.answer.filter(item => item === true).length,
      totalQuestion: this.state.totalQuestion }));



  }}


class Header extends React.Component {
  constructor(props) {
    super(props);_defineProperty(this, "isStart",




    () => {
      this.setState(prevState => {
        return {
          start: !prevState.start };

      });
      window.scroll(0, 0);
    });this.state = { start: false };}
  render() {
    return (

    
      React.createElement("header", { className: !this.state.start ? 'header intro' : 'header fade-in' },
      React.createElement("div", null,
      React.createElement("img", {
        src: "img/politician.png",
        alt: "Logo",
        className:
        !this.state.start ? 'header--logo__large fade-in' : 'header--logo' }),


      !this.state.start ?
      React.createElement(React.Fragment, null,
      React.createElement("h1", null, "Escoge que harías si.."),
      React.createElement("p", null, "Te puedes encontrar con situaciones similares en la vida real"),
       
      

      React.createElement("button", { onClick: this.isStart }, "Comenzar")) :


      ''
      )));




  }}


class Result extends React.Component {
  constructor(props) {
    super(props);_defineProperty(this, "share",

    media => {
      console.log(media);
      const text = `I have finished this food quiz and get ${
      this.props.answer
      } out of ${this.props.totalQuestion}!`;
     
      console.log(encodeURIComponent(text));
      
    });}
  render() {
    return (
      React.createElement(React.Fragment, null,
      React.createElement("section", { className: "result fade-in" },
      React.createElement("div", { className: "result__image" },
      React.createElement("img", {
        src: "img/forito.jpeg",
        alt: "Esperamos Hayas tomado las desiciones correctas" })),


      React.createElement("div", { className: "result__text" },
      React.createElement("h1", null, "Tus Resultados"),
      React.createElement("p", null, " obtuviste",
      React.createElement("strong", null, this.props.answer), " de",
      React.createElement("strong", null, " ", this.props.totalQuestion, " "), "!!"),


    


      React.createElement("button", {
        className: "result__button result__button--puntajes",
        onClick: () => this.share('puntajes') }, "Ver Puntajes anteriores")))));







  }}


class App extends React.Component {
  render() {
    return React.createElement(Quiz, null);
  }}


ReactDOM.render(React.createElement(App, null), document.getElementById('app'));