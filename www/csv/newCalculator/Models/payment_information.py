from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class payment_information(Base):
	__tablename__ = 'payment_information'
	id = Column(Integer, primary_key=True)
	CPID = Column(Text)
	ChrgSessID = Column(Text)
	Time = Column(Text)
	StartTime = Column(Text)
	StopTime = Column(Text)
	Duration = Column(Text)
	Energy = Column(Text)
	VatPercent = Column(Text)
	PriceExclVat = Column(Text)
	Currency = Column(Text)

