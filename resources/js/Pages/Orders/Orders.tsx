import Authenticated from "@/Layouts/AuthenticatedLayout";
import {
    doCreateOrders,
    doGetAll,
    doGetAllById,
    doGetOrders,
} from "@/services/order-services";
import { DataTypeOrder, FieldType, PageProps } from "@/types";
import {
    CheckCircleOutlined,
    CloseCircleOutlined,
    SyncOutlined,
} from "@ant-design/icons";
import { Head } from "@inertiajs/react";
import {
    Button,
    Card,
    DatePicker,
    Form,
    Input,
    Modal,
    Select,
    Tag,
} from "antd";
import { DefaultOptionType } from "antd/es/select";
import Table, { ColumnsType } from "antd/es/table";
import dayjs from "dayjs";
import { useEffect, useState } from "react";
import { AiOutlinePlusCircle } from "react-icons/ai";
import Swal from "sweetalert2";

const Orders = ({ auth }: PageProps) => {
    const [datas, setData] = useState<DataTypeOrder[]>([]);
    const [optionsLokasi, setOptionsLokasi] = useState<DefaultOptionType[]>([]);
    const [optionsKendaraan, setOptionsKendaraan] = useState<
        DefaultOptionType[]
    >([]);
    const [optionsKaryawan, setOptionsKaryawan] = useState<DefaultOptionType[]>(
        []
    );
    const [optionsSupervisor, setOptionsSupervisor] = useState<
        DefaultOptionType[]
    >([]);
    const [optionsManager, setOptionsManager] = useState<DefaultOptionType[]>(
        []
    );

    const [idLokasi, setIdLokasi] = useState<number>(0);
    const [form] = Form.useForm();

    const [showModalAdd, setShowModalAdd] = useState<boolean>(false);

    const fetchDataOrders = () => {
        doGetOrders().then((response) => {
            if (response.success === true) {
                setData(response.data);
            }
        });
    };

    const columns: ColumnsType<DataTypeOrder> = [
        {
            title: "No",
            dataIndex: "id",
            key: "id",
        },
        {
            title: "Nama Kendaraan",
            dataIndex: "nama_kendaraan",
            key: "nama_kendaraan",
        },
        {
            title: "Lokasi",
            dataIndex: "lokasi",
            key: "lokasi",
        },
        {
            title: "Karyawan",
            dataIndex: "karyawan",
            key: "karyawan",
        },
        {
            title: "Supervisor",
            dataIndex: "supervisor",
            key: "supervisor",
        },
        {
            title: "Manager",
            dataIndex: "manager",
            key: "manager",
        },
        {
            title: "Status Manager",
            dataIndex: "status_manager",
            key: "status_manager",
            render: (status) => {
                let content;
                if (status === "Pending") {
                    content = (
                        <Tag icon={<SyncOutlined spin />} color="processing">
                            {status}
                        </Tag>
                    );
                } else if (status === "Apply") {
                    content = (
                        <Tag icon={<CheckCircleOutlined />} color="success">
                            {status}
                        </Tag>
                    );
                } else if (status === "Reject") {
                    content = (
                        <Tag icon={<CloseCircleOutlined />} color="error">
                            {status}
                        </Tag>
                    );
                }
                return content;
            },
        },
        {
            title: "Status Supervisor",
            dataIndex: "status_supervisor",
            key: "status_supervisor",
            render: (status) => {
                let content;
                if (status === "Pending") {
                    content = (
                        <Tag icon={<SyncOutlined spin />} color="processing">
                            {status}
                        </Tag>
                    );
                } else if (status === "Apply") {
                    content = (
                        <Tag icon={<CheckCircleOutlined />} color="success">
                            {status}
                        </Tag>
                    );
                } else if (status === "Reject") {
                    content = (
                        <Tag icon={<CloseCircleOutlined />} color="error">
                            {status}
                        </Tag>
                    );
                }
                return content;
            },
        },
        {
            title: "Tanggal Pemakaian",
            dataIndex: "tanggal_pemakaian",
            key: "tanggal_pemakaian",
        },
        {
            title: "Tanggal Pengembalian",
            dataIndex: "tanggal_pengembalian",
            key: "tanggal_pengembalian",
        },
    ];

    const handleModalAdd = () => {
        setShowModalAdd(!showModalAdd);
    };

    const handleCancel = () => {
        setShowModalAdd(!showModalAdd);
        form.resetFields();
    };

    const handleSubmit = async (values: any) => {
        try {
            await form.validateFields();
            const data: FieldType = {
                kendaraans_id: values.kendaraans_id,
                locations_id: values.locations_id,
                karyawan_id: values.karyawan_id,
                supervisor_id: values.supervisor_id,
                manager_id: values.manager_id,
                tanggal_pemakaian: dayjs(values.start[0]).format("YYYY-MM-DD"),
                tanggal_pengembalian: dayjs(values.start[1]).format(
                    "YYYY-MM-DD"
                ),
            };
            doCreateOrders(data).then((response) => {
                console.log("res", response);
                if (response.success === true) {
                    Swal.fire("Saved!", "", "success").then((res) => {
                        if (res.isConfirmed) {
                            fetchDataOrders();
                            handleModalAdd();
                        }
                    });
                }
            });
            form.resetFields();
        } catch (error) {
            console.log(error);
        }
    };

    const fetchDataAll = () => {
        doGetAll().then((response) => {
            if (response.success === true) {
                const { data } = response;
                const newArr: DefaultOptionType[] = [];
                data?.map((item: any) => {
                    const newObj = {
                        value: item.id,
                        label: item.name,
                    };
                    newArr.push(newObj);
                });
                setOptionsLokasi(newArr);
            }
        });
    };

    useEffect(() => {
        fetchDataOrders();
        fetchDataAll();
    }, []);

    const fetchDataAllById = () => {
        doGetAllById(idLokasi).then((response) => {
            if (response.success === true) {
                const { data } = response;
                console.log("data", typeof data);

                const newArr: DefaultOptionType[] = [];
                data.kendaraan?.map((item: any) => {
                    const newObj = {
                        value: item.id,
                        label: item.name,
                    };
                    newArr.push(newObj);
                });
                setOptionsKendaraan(newArr);

                const newArrEmp: DefaultOptionType[] = [];
                data.employe
                    .filter((items: any) => items.type_users_id === 1)
                    ?.map((item: any) => {
                        const newObjEmp = {
                            value: item.id,
                            label: item.firstname + " " + item.lastname,
                        };
                        newArrEmp.push(newObjEmp);
                    });
                setOptionsKaryawan(newArrEmp);

                const newArrSup: DefaultOptionType[] = [];
                data.employe
                    .filter((items: any) => items.type_users_id === 2)
                    ?.map((item: any) => {
                        const newObjSup = {
                            value: item.id,
                            label: item.firstname + " " + item.lastname,
                        };
                        newArrSup.push(newObjSup);
                    });
                setOptionsSupervisor(newArrSup);

                const newArrMan: DefaultOptionType[] = [];
                data.employe
                    .filter((items: any) => items.type_users_id === 3)
                    ?.map((item: any) => {
                        const newObjMan = {
                            value: item.id,
                            label: item.firstname + " " + item.lastname,
                        };
                        newArrMan.push(newObjMan);
                    });
                setOptionsManager(newArrMan);
            }
        });
    };

    useEffect(() => {
        fetchDataAllById();
    }, [idLokasi]);

    const onChangeLokasi = (value: number) => {
        setIdLokasi(value);
    };

    return (
        <Authenticated user={auth.user}>
            <Head title="Orders" />
            <Card
                title="Orders"
                extra={
                    <Button
                        className="flex justify-center items-center gap-2"
                        onClick={handleModalAdd}
                    >
                        <AiOutlinePlusCircle />
                        Add Orders
                    </Button>
                }
            >
                <Table
                    columns={columns}
                    dataSource={datas}
                    pagination={false}
                />
            </Card>
            <Modal
                title="Add Orders"
                open={showModalAdd}
                onCancel={handleCancel}
                onOk={handleSubmit}
                footer={
                    <div>
                        <Button onClick={handleCancel}>Batal</Button>
                        <Button
                            onClick={() => form.submit()}
                            className="ant-btn ant-btn-primary"
                            style={{
                                backgroundColor: "#1890ff",
                                borderColor: "#1890ff",
                            }}
                        >
                            Simpan
                        </Button>
                    </div>
                }
            >
                <Form
                    name="form_in_modal"
                    layout="vertical"
                    initialValues={{ remember: true }}
                    autoComplete="off"
                    form={form}
                    onFinish={handleSubmit}
                >
                    <Form.Item
                        name={"locations_id"}
                        label="Lokasi"
                        rules={[
                            {
                                required: true,
                                message: "pilih lokasi",
                            },
                        ]}
                    >
                        <Select
                            showSearch
                            placeholder="Pilih Lokasi"
                            size="large"
                            style={{ width: "100%" }}
                            options={optionsLokasi}
                            onChange={onChangeLokasi}
                        />
                    </Form.Item>
                    <Form.Item
                        name={"kendaraans_id"}
                        label="Kendaraan"
                        rules={[
                            {
                                required: true,
                                message: "pilih kendaraan",
                            },
                        ]}
                    >
                        <Select
                            showSearch
                            placeholder="Pilih Kendaraan"
                            size="large"
                            style={{ width: "100%" }}
                            options={optionsKendaraan}
                        />
                    </Form.Item>
                    <Form.Item
                        name={"karyawan_id"}
                        label="Karyawan"
                        rules={[
                            {
                                required: true,
                                message: "pilih karyawan",
                            },
                        ]}
                    >
                        <Select
                            showSearch
                            placeholder="Pilih Karyawan"
                            size="large"
                            style={{ width: "100%" }}
                            options={optionsKaryawan}
                        />
                    </Form.Item>
                    <Form.Item
                        name={"supervisor_id"}
                        label="Supervisor"
                        rules={[
                            {
                                required: true,
                                message: "pilih Supervisor",
                            },
                        ]}
                    >
                        <Select
                            showSearch
                            placeholder="Pilih Supervisor"
                            size="large"
                            style={{ width: "100%" }}
                            options={optionsSupervisor}
                        />
                    </Form.Item>
                    <Form.Item
                        name={"manager_id"}
                        label="Manager"
                        rules={[
                            {
                                required: true,
                                message: "pilih Manager",
                            },
                        ]}
                    >
                        <Select
                            showSearch
                            placeholder="Pilih Manager"
                            size="large"
                            style={{ width: "100%" }}
                            options={optionsManager}
                        />
                    </Form.Item>
                    <Form.Item name="start" label="Waktu Pemakaian">
                        <DatePicker.RangePicker format="YYYY-MM-DD" />
                    </Form.Item>
                </Form>
            </Modal>
        </Authenticated>
    );
};

export default Orders;
