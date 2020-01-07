import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { Button, Container, Row, Col, Table, Modal, Badge } from 'react-bootstrap';
import moment from 'moment';

export default class Calendar extends Component {

    constructor(props) {
        super(props);
        this.state = {
            weekDay: [],
            hours: [8,9,10,11,12,13,14,15,16,17,18,19,20,21,22],
            showModal: false,
            currentDayName: '',
            currentDay: '',
            currentHour: ''
        };

        this.handleAddWeek = this.handleAddWeek.bind(this);
        this.handleLessWeek = this.handleLessWeek.bind(this);
        this.handleOpenModal = this.handleOpenModal.bind(this);
        this.handleCloseModal = this.handleCloseModal.bind(this);
    }

    handleOpenModal(value1, value2) {

        console.log(value1);
        console.log(value2);

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

        this.setState({
            showModal: true,
            currentDayName: myDayName,
            currentDay: value1.format('DD/MM/YYYY'),
            currentHour: value2 + ':00'
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
        let myArrayDay = [];
        for (let index = 0; index < 7; index++) {

            let dayStartWeek = moment().startOf('week');
            let myDate = dayStartWeek.add(index, 'days');

            myArrayDay.push(myDate);

        }
        this.setState({
            weekDay: myArrayDay
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
            return this.state.weekDay.map(value => {
                return (
                    <td key={value} onClick={() => this.handleOpenModal(value, hour)}>

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
                <Modal show={this.state.showModal} onHide={this.handleCloseModal}>
                    <Modal.Header closeButton>
                        <Modal.Title>Info Cita | <Badge variant="primary">{ this.state.currentDayName }</Badge> - <Badge variant="success">{ this.state.currentHour }</Badge> - <Badge variant="dark">{ this.state.currentDay }</Badge></Modal.Title>
                    </Modal.Header>
                    <Modal.Body>
                        <Container>
                            <Row>
                                <Col>
                                    <h5>Crear Citas</h5>
                                </Col>
                            </Row>
                            <hr />
                            <Row>
                                <Col>
                                    <h5>Mis Citas</h5>
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
