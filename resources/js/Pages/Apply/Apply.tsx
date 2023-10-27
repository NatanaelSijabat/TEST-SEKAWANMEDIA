import ExportExcel from "@/Components/Excel";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { doGetOrders, doUpdateOrders } from "@/services/order-services";
import { DataTypeOrder, FieldTypeUpdate, PageProps } from "@/types";
import {
    CheckCircleOutlined,
    CheckOutlined,
    CloseCircleOutlined,
    CloseOutlined,
    SyncOutlined,
} from "@ant-design/icons";
import { Head } from "@inertiajs/react";
import { Button, Card, Table, Tag } from "antd";
import { ColumnsType } from "antd/es/table";
import { useEffect, useState } from "react";
import Swal from "sweetalert2";

const Apply = ({ auth }: PageProps) => {
    const handleApplyOrderManager = (id: any) => {
        const data: FieldTypeUpdate = {
            id,
            status_manager: 2,
        };
        doUpdateOrders(data).then((response) => {
            if (response.success === true) {
                Swal.fire("Updated!", "", "success").then((res) => {
                    if (res.isConfirmed) {
                        fetchDataOrders();
                    }
                });
            }
        });
    };

    const handleApplyOrderSupervisor = (id: any) => {
        const data: FieldTypeUpdate = {
            id,
            status_supervisor: 2,
        };
        doUpdateOrders(data).then((response) => {
            if (response.success === true) {
                Swal.fire("Updated!", "", "success").then((res) => {
                    if (res.isConfirmed) {
                        fetchDataOrders();
                    }
                });
            }
        });
    };

    const handleRejectOrderManager = (id: any) => {
        const data: FieldTypeUpdate = {
            id,
            status_manager: 3,
        };
        doUpdateOrders(data).then((response) => {
            if (response.success === true) {
                Swal.fire("Updated!", "", "success").then((res) => {
                    if (res.isConfirmed) {
                        fetchDataOrders();
                    }
                });
            }
        });
    };

    const handleRejectOrderSupervisor = (id: any) => {
        const data: FieldTypeUpdate = {
            id,
            status_supervisor: 3,
        };
        doUpdateOrders(data).then((response) => {
            if (response.success === true) {
                Swal.fire("Updated!", "", "success").then((res) => {
                    if (res.isConfirmed) {
                        fetchDataOrders();
                    }
                });
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
        {
            title: "Aksi",
            render(value, record, index) {
                let content;
                if (auth.user.employees_id === record.IdManager) {
                    if (record.status_manager === "Apply") {
                        content = null;
                    } else if (record.status_manager === "Pending") {
                        content = (
                            <div className="flex justify-center items-center gap-3">
                                <Button
                                    size="small"
                                    icon={<CheckCircleOutlined />}
                                    onClick={() =>
                                        handleApplyOrderManager(record.id)
                                    }
                                />
                                <Button
                                    size="small"
                                    icon={<CloseOutlined />}
                                    onClick={() =>
                                        handleRejectOrderManager(record.id)
                                    }
                                />
                            </div>
                        );
                    } else if (record.status_manager === "Reject") {
                        content = null;
                    }
                } else if (auth.user.employees_id === record.IdSupervisor) {
                    if (record.status_supervisor === "Apply") {
                        content = null;
                    } else if (record.status_supervisor === "Pending") {
                        content = (
                            <div className="flex gap-3">
                                <Button
                                    size="small"
                                    icon={<CheckCircleOutlined />}
                                    onClick={() =>
                                        handleApplyOrderSupervisor(record.id)
                                    }
                                />
                                <Button
                                    size="small"
                                    icon={<CloseOutlined />}
                                    onClick={() =>
                                        handleRejectOrderSupervisor(record.id)
                                    }
                                />
                            </div>
                        );
                    } else if (record.status_supervisor === "Reject") {
                        content = null;
                    }
                }
                return content;
            },
        },
    ];

    const [dataManager, setDataManager] = useState<DataTypeOrder[]>([]);
    const [dataSupervisor, setDataSupervisor] = useState<DataTypeOrder[]>([]);

    const fetchDataOrders = () => {
        doGetOrders().then((response) => {
            if (response.success === true) {
                const { data } = response;

                const filterDataSup = data.filter(
                    (items: any) => items.IdSupervisor == auth.user.employees_id
                );
                setDataSupervisor(filterDataSup);

                const filterDataMan = data.filter(
                    (items: any) => items.IdManager == auth.user.employees_id
                );
                setDataManager(filterDataMan);
            }
        });
    };

    useEffect(() => {
        fetchDataOrders();
    }, []);

    // console.log("data su", dataSupervisor);
    // console.log("data ma", dataManager);

    return (
        <Authenticated user={auth.user}>
            <Head title="Apply" />

            <Card title="Apply Orders">
                {dataSupervisor && dataSupervisor.length > 0 ? (
                    <Table
                        columns={columns}
                        pagination={false}
                        dataSource={dataSupervisor}
                        bordered
                    />
                ) : dataManager && dataManager.length > 0 ? (
                    <Table
                        bordered
                        columns={columns}
                        pagination={false}
                        dataSource={dataManager}
                    />
                ) : (
                    <Table bordered columns={columns} pagination={false} />
                )}
            </Card>
        </Authenticated>
    );
};

export default Apply;
