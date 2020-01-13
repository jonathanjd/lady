import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { Button, Container, Row, Col, Table, Modal, Badge, Card, Form } from 'react-bootstrap';
import moment from 'moment';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faUser } from '@fortawesome/free-solid-svg-icons'


export default class Calendar extends Component {

    constructor(props) {
        super(props);

        let myArrayDay = [];
        for (let index = 0; index < 7; index++) {

            let dayStartWeek = moment().startOf('week');
            let myDate = dayStartWeek.add(index, 'days');

            myArrayDay.push(myDate);

        }

        this.state = {
            weekDay: myArrayDay,
            hours: [8,9,10,11,12,13,14,15,16,17,18,19,20,21,22],
            showModal: false,
            currentDayName: '',
            currentDay: '',
            currentHour: '',
            myCustomer: [],
            myCalendar: [],
            showToast: false,
            myToastText: '',
            startDate: moment().startOf('week').format('YYYY-MM-DD'),
            endDate: moment().endOf('week').format('YYYY-MM-DD'),
            myInfoCalendar: [],
            myForm: {
                customerID: '1',
                service: ''
            }
        };

        this.handleAddWeek = this.handleAddWeek.bind(this);
        this.handleLessWeek = this.handleLessWeek.bind(this);
        this.handleOpenModal = this.handleOpenModal.bind(this);
        this.handleCloseModal = this.handleCloseModal.bind(this);
        this.handleSave = this.handleSave.bind(this);
        this.handleChangeSelect = this.handleChangeSelect.bind(this);
        this.hanldeChangeInput = this.hanldeChangeInput.bind(this);
    }

    handleShowToast() {
        this.setState({
            showToast: !this.state.showToast
        });
    }

    handleSave() {
        console.log('HandleSave');
        this.setState({
            showModal: false
        });

    }

    handleStoreCalendar() {

    }

    handleChangeSelect(e) {
        this.setState({ myForm:{customerID: e.target.value, service: this.state.myForm.service} });
    }

    hanldeChangeInput(e) {
        this.setState({ myForm:{customerID: this.state.myForm.customerID, service: e.target.value} });
    }

    handleOpenModal(value1, value2) {

        console.log('Open Modal')
        console.log(value1)
        console.log(value2)

        this.setState(
            { myForm:{customerID: '1', service: ''} }
        );

        let myDayName = '';
            switch (value1.day()) {
                case 0:
                    myDayName = 'Domingo'
                    break;
                case 1:
                    myDayName = 'Lunes'
                    break;
                case 2:
                    myDayName = 'Martes'
                    break;
                case 3:
                    myDayName = 'Miercoles'
                    break;
                case 4:
                    myDayName = 'Jueves'
                    break;
                case 5:
                    myDayName = 'Viernes'
                    break;
                case 6:
                    myDayName = 'Sabado'
                    break;

            }

        this.fetchMyCalendar('0' + value2 + ':00:00', value1.format('YYYY-MM-DD'));

        this.setState({
            showModal: true,
            currentDayName: myDayName,
            currentDay: value1.format('DD/MM/YYYY'),
            currentHour: value2 + ':00'
        });
    }

    fetchMyCalendar(myHour, myDate) {

        fetch('/api/calendar/' + myHour + '/' + myDate)
            .then(response => {
                return response.json();
            })
            .then(myJson => {

                this.setState({
                    myInfoCalendar: myJson.getCalendar
                });
        });

    }

    handleCloseModal() {
        this.setState({
            showModal: false
        });
    }

    handleAddWeek() {

        console.log('handleAddWek')

        let getLastDay = this.state.weekDay[6];

        let myArrayDate = [];

        for (let index = 1; index < 8; index++) {

            let myDateLast = moment(getLastDay);

            let myDate = myDateLast.add(index, 'days');

            myArrayDate.push(myDate);

        }

        this.setState({
            weekDay: myArrayDate
        });

    }

    handleLessWeek() {
        console.log('hanldeLessWeek')

        let getLastDay = this.state.weekDay[0];

        let myArrayDate = [];

        for (let index = 1; index < 8; index++) {

            let myDateLast = moment(getLastDay);

            let myDate = myDateLast.subtract(index, 'days');

            myArrayDate.push(myDate);

        }

        this.setState({
            weekDay: myArrayDate.reverse()
        });
    }

    componentDidMount() {

        this.fetchCalendar();
        this.fetchCustomer();
    }

    fetchCustomer() {

        fetch('/api/list-customer')
            .then(response => {
                return response.json();
            })
            .then(myJson => {

                this.setState({
                    myCustomer: myJson.listCustomer
                });
        });

    }

    fetchCalendar() {

        let {startDate, endDate} = this.state;

        fetch('/api/list-calendar/' + startDate + '/' + endDate)
            .then(response => {
                return response.json();
            })
            .then(myJson => {

                this.setState({
                    myCalendar: myJson.listCalendar
                });
        });
    }


    render() {

        let myThDay = this.state.weekDay.map(value => {

            let myDayName = '';
            switch (value.day()) {
                case 0:
                    myDayName = 'Domingo'
                    break;
                case 1:
                    myDayName = 'Lunes'
                    break;
                case 2:
                    myDayName = 'Martes'
                    break;
                case 3:
                    myDayName = 'Miercoles'
                    break;
                case 4:
                    myDayName = 'Jueves'
                    break;
                case 5:
                    myDayName = 'Viernes'
                    break;
                case 6:
                    myDayName = 'Sabado'
                    break;

            }

            return(
                <th key={value.format('DD-MM-YYYY')}>
                    { myDayName } <br />
                    {value.format('DD-MM-YYYY')}
                </th>
            )
        });

        let myTD = (hour) => {

            let { myCalendar } = this.state;

            let itemValue = '';

            return this.state.weekDay.map(value => {

                let showData = myCalendar.map(item => {
                    let myDate = moment(item.date).format('DD-MM-YYYY');
                    let myHour = item.hour;
                    let myDateTD = value.format('DD-MM-YYYY');

                    if (myDate === myDateTD && myHour === '0' + hour + ':00:00' ) {
                        itemValue = item;
                        return <FontAwesomeIcon style={{'padding': '1'}} icon={faUser} key={item.id} color="green" />;
                    } else {

                        return '';
                    }
                });

                return (
                    <td key={value} onClick={() => this.handleOpenModal(value, hour)} className="text-center">
                        { showData }
                    </td>
                )
            });
        }


        let myTableBody = this.state.hours.map(value => {
            return(
                <tr key={value}>
                    <td>{ value + ':00' }</td>
                    { myTD(value) }
                </tr>
            )
        });

        let myInfoContent = null;

        if (!this.state.myInfoCalendar.length > 0) {
            myInfoContent = <div className="text-center">
                                <p>No Tienes Citas</p>
                            </div>;
        } else {
            myInfoContent = this.state.myInfoCalendar.map( value => {
                return(
                    <div key={value.id}>
                        <p><strong>Cliente:</strong> { value.mydate.customer.name } / <strong>Teléfono:</strong> { value.mydate.customer.phone } / <strong>Servicio:</strong> { value.mydate.service }</p>
                        <p><strong>Correo:</strong> { value.mydate.customer.email }</p>
                        <p><strong>Nota:</strong> { value.mydate.customer.note }</p>
                        <hr />
                    </div>
                );
            });

        }

        let myOption = this.state.myCustomer.map( value => {
            return(
                <option key={value.id} value={value.id}>{ value.name }</option>
            );
        });

        return (
            <Container>
                <Row>
                    <Col className={'text-center'}>
                        <Button onClick={this.handleLessWeek} variant="info"> {'<'} </Button>
                    </Col>
                    <Col className={'text-center'}>
                        <h3>Enero</h3>
                    </Col>
                    <Col className={'text-center'}>
                    <Button onClick={this.handleAddWeek} variant="info"> {'>'} </Button>
                    </Col>
                </Row>
                <Row>
                    <Col>
                        <Table striped bordered hover>
                            <thead>
                                <tr>
                                <th>Hora</th>
                                { myThDay }
                                </tr>
                            </thead>
                            <tbody>
                                { myTableBody }
                            </tbody>
                        </Table>
                    </Col>
                </Row>
                <Modal show={this.state.showModal} onHide={this.handleCloseModal} size="lg" centered>
                    <Modal.Header closeButton>
                        <Modal.Title>Info Cita | <Badge variant="primary">{ this.state.currentDayName }</Badge> - <Badge variant="success">{ this.state.currentHour }</Badge> - <Badge variant="dark">{ this.state.currentDay }</Badge></Modal.Title>
                    </Modal.Header>
                    <Modal.Body>
                        <Container>

                            <Row>
                                <Col>
                                <Card>
                                    <Card.Header>Mis Citas</Card.Header>
                                    <Card.Body>
                                        { myInfoContent }
                                    </Card.Body>
                                </Card>
                                </Col>
                            </Row>

                        </Container>
                    </Modal.Body>
                    <Modal.Footer>
                    <Button block variant="secondary" onClick={this.handleCloseModal}>
                        Close
                    </Button>
                    </Modal.Footer>
                </Modal>
            </Container>
        )
    }
}

if (document.getElementById('calendar')) {
    ReactDOM.render(<Calendar />, document.getElementById('calendar'));
}
